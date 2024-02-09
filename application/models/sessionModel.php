<?php

class sessionModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function requestSession($stud_id, $te_ava_id ,$subject_id){
        $stud_id = strip_tags($stud_id);
        $te_ava_id = strip_tags($te_ava_id);
        $subject_id = strip_tags($subject_id);

        $sql = "SELECT * FROM `session` WHERE subject_id = :subject_id AND teacher_availability_id =:te_ava_id";

        $query = $this->db->prepare($sql);
        $query->execute(array(
                ':subject_id' => $subject_id,
                ':te_ava_id' => $te_ava_id));

        $sessions = $query ->fetchAll();

        $ok = false;

        if ($sessions == NULL){    
            $sql = "INSERT INTO `session`(`id`, `topic`, `subject_id`, `teacher_availability_id`, `status`, `reject_reason`, `student_count`)
                    VALUES (NULL, '' ,:subject_id , :te_ava_id , 0 , '' , 1)";

            $query = $this->db->prepare($sql);
            $query->execute(array(
                    ':subject_id' => $subject_id,
                    ':te_ava_id' => $te_ava_id));
            
        }
        else{
            $sql = "SELECT * FROM `session` JOIN `student_session` on ( session_id = session.id)
                    WHERE subject_id = :subject_id AND teacher_availability_id =:te_ava_id";

            $query = $this->db->prepare($sql);
            $query->execute(array(
                    ':subject_id' => $subject_id,
                    ':te_ava_id' => $te_ava_id));

            $st_sessions = $query ->fetchAll();

            foreach ($st_sessions as $tmp) {
                if ($tmp->student_user_id == $stud_id)
                    $ok = true;
            }


            if (!$ok) {
                $sql = "UPDATE `session`
                        SET `student_count`=:std_count
                        WHERE `id` = :ses_id";
                $query = $this->db->prepare($sql);
                $query->execute(array(
                        ':std_count' => $sessions[0]->student_count + 1,
                        ':ses_id' => $sessions[0]->id));
            }
        }

        if (!$ok){    
            $sql = "SELECT id, student_count FROM `session`
            WHERE subject_id = :subject_id AND teacher_availability_id =:te_ava_id";
            
            $query = $this->db->prepare($sql);
            $query->execute(array(
                    ':subject_id' => $subject_id ,
                    ':te_ava_id' => $te_ava_id ));
            $student_session = $query ->fetchAll();

            
            $sql =" INSERT INTO `student_session`(`id`, `student_user_id`, `session_id`, `rate`, `comment`, `is_approved`)
                    VALUES (NULL , :stud_id , :student_session , 0 , '' , 0 )";

            $query = $this->db->prepare($sql);
            $query->execute(array(
                    ':stud_id' => $stud_id,
                    ':student_session' => $student_session[0]->id));
        }
        return !$ok;
    }

    public function getAllCourses(){
        $sql = "SELECT *,subject.id as sub_id FROM `subject` join `teacher` ON(teacher_user_id=teacher.user_id) join `user` on (teacher.user_id = user.id)";
        $query = $this->db->prepare($sql);
        $query->execute(array());
        return $query->fetchAll();
    }


    public function getCourseDetails($id){
        $sql = "SELECT * FROM `subject` WHERE id = :id ";
        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':id' => $id
        ));
        return $query->fetchAll();
    }


    
    public function getAllSessions(){
        $sql = "SELECT *,first_name, last_name, subject.name, `from`,`to`,`date`,student_count,`status`,session.id as session_id
                FROM `availability` join `teacher_availability` on (availability.id = availability_id)
                                    join `session`on (teacher_availability.id = teacher_availability_id)
                                    join `subject` on (subject.id = subject_id)
                                    join `teacher` on (teacher_availability.teacher_user_id = teacher.user_id)
                                    join `user` on ( user.id = teacher.user_id)";

        $query = $this->db->prepare($sql);
        $query->execute(array());
        return $query->fetchAll();
        
    }


    public function getSessionRequests($id){
        $sql = "SELECT *, teacher_availability_id as t_a_id, subject_id as s_id  FROM `availability`join `teacher_availability` on (availability.id = availability_id)
                                            join `session`on (teacher_availability.id = teacher_availability_id)
                                            join `subject` on (subject.id = subject_id)
                                            WHERE teacher_availability.teacher_user_id = :id
                                            AND `status` != -1";
        
        $query = $this->db->prepare($sql);
        $query->execute(array( ':id' => $id));
        return $query->fetchAll();
    }
    
    
    public function getSessionDetails($subject_id, $te_ava_id){
        $sql = "SELECT * FROM `availability`join `teacher_availability` on (availability.id = availability_id)
                                            join `session`on (teacher_availability.id = teacher_availability_id)
                                            join `subject` on (subject.id = subject_id)
                                            WHERE teacher_availability.id = :te_ava_id
                                            and subject_id = :subject_id";
        
        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':subject_id' => $subject_id,
            ':te_ava_id'  =>$te_ava_id                          
        ));
        
        return $query->fetchAll();
    }    

    public function adjustSessions($title , $reject_reason , $subject_id , $te_ava_id){

        $sql = "UPDATE teacher_availability 
                SET is_availability_closed = 1
                WHERE id = :te_ava_id";

        $query = $this->db->prepare($sql);
        $query->execute(array(
        ':te_ava_id'  =>$te_ava_id                          
        ));

        $sql = "UPDATE `session` 
                SET `status` = -1 , reject_reason = :reject_reason
                WHERE teacher_availability_id = :te_ava_id";

        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':te_ava_id'  =>$te_ava_id,
            ':reject_reason' => $reject_reason                          
        ));


        $sql = "UPDATE `session` 
                SET `status` = 1 , reject_reason = '', topic =:title
                WHERE teacher_availability_id = :te_ava_id
                AND subject_id = :subject_id";

        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':te_ava_id'  =>$te_ava_id,
            ':subject_id' => $subject_id,
            ':title' => $title                      
        ));

        $sql = "SELECT id FROM `session`
                WHERE teacher_availability_id = :te_ava_id";

        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':te_ava_id'  =>$te_ava_id              
        ));

        $thisSession = $query->fetchAll();

        $sql = "UPDATE student_session
                SET is_approved = -1
                WHERE session_id = :session_id";

        $query = $this->db->prepare($sql);

        foreach($thisSession as $tmp) {
                $query->execute(array(
                ':session_id' => $tmp->id              
                ));
        }

        

        $sql = "SELECT id FROM `session`
                WHERE teacher_availability_id = :te_ava_id
                AND subject_id = :subject_id";

        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':te_ava_id'  =>$te_ava_id,
            ':subject_id' => $subject_id     
        ));

        $thisSession = $query->fetchAll();

        $sql = "UPDATE student_session
                SET is_approved = 1
                WHERE session_id = :session_id ";

        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':session_id' => $thisSession[0]->id              
        ));
    }

    public function getStudentSessions($id){
        $sql = "SELECT subject.name as subject_name,
                       session.topic as session_topic,
                       user.first_name as teacher_first_name,
                       user.last_name  as teacher_last_name,
                       `date`,
                       `from`,
                       `to`,
                       `is_approved`,
                       `session_id`,
                       teacher_availability_id,
                       subject_id,
                       reject_reason,
                       rate
                FROM `student_session` join `session` on (session_id = session.id)
                                    join `subject` on (subject_id = subject.id)
                                    join `teacher_availability` on (teacher_availability_id = teacher_availability.id)
                                    join `availability` on (availability.id = availability_id)
                                    join `teacher` on (teacher_availability.teacher_user_id = user_id)
                                    join `user` on (user.id = user_id)
                WHERE student_user_id=:id";
                
        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':id' => $id          
        ));

        return $query->fetchAll();
    }
}