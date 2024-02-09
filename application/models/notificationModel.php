<?php

class notificationModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    
    public function addNewTeacherNotificaton($stud_id, $te_ava_id ,$subject_id , $type){   
            
        $stud_id = strip_tags($stud_id);
        $te_ava_id = strip_tags($te_ava_id);
        $subject_id = strip_tags($subject_id);
        $type = strip_tags($type);
            
        $sql =" SELECT teacher_user_id FROM `session` join teacher_availability on (teacher_availability_id = teacher_availability.id)
                WHERE teacher_availability_id = :te_ava_id";
        
        $query = $this->db->prepare($sql);
        $query->execute(array(
                ':te_ava_id' => $te_ava_id));
        $teacher_id = $query->fetchAll();

        $sql =" SELECT `name` FROM `subject`
                WHERE id = :subject_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
                ':subject_id' => $subject_id));
        $subject_name = $query->fetchAll();


        $body = "";
        $header = "";
        if ($type == 1 ) {
                $body = 'have requested a session of yours';
                $header = 'Session Request';
        }
        else if ($type == 2 ) {
                $body = 'have rated your session on course';
                $header = 'Review';
        }

                
        $sql = "INSERT INTO `notification` (id, header, body, seen , seen_date, sender_id , subject_name)
                VALUES (NULL, :header , :body , 0 , NULL, :stud_id , :subject_name)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
                ':header' => $header,
                ':stud_id' => $stud_id,        
                ':body' => $body,
                ':subject_name' => $subject_name[0]->name
                ));

        $sql = "SELECT `id` FROM `notification` ORDER by id DESC LIMIT 1";
        $query = $this->db->prepare($sql);
        $query->execute(array());
        $last_notification_id = $query ->fetchAll();


        $sql = "INSERT INTO `user_notification` (id, recipient_id, notification_id)
                VALUES (NULL, :recipient_id , :notification_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
                ':recipient_id' => $teacher_id[0]->teacher_user_id,        
                ':notification_id' => $last_notification_id[0]->id
                ));
        }



    public function addNewStudentNotificaton($teacher_id ,$subject_id , $te_ava_id){   
        
        $teacher_id = strip_tags($teacher_id);
        $te_ava_id = strip_tags($te_ava_id);
        $subject_id = strip_tags($subject_id);
                
        $body1 = 'have REJECTED your session request on course ';
        $sql = "SELECT student_user_id, subject.name as subject_name FROM student_session JOIN session on (session.id = session_id)
                                                        JOIN subject on (subject.id = subject_id)
                WHERE teacher_availability_id = :te_ava_id
                AND subject_id != :subject_id";

        $query = $this->db->prepare($sql);
        $query->execute(array(
                ':subject_id' => $subject_id,
                ':te_ava_id' => $te_ava_id
        ));
        $rejected_students = $query -> fetchAll();
                
        foreach ($rejected_students as $tmp) {
                $sql = "INSERT INTO `notification` (id, header, body, seen , seen_date, sender_id , subject_name)
                        VALUES (NULL, 'Teacher Response' , :body , 0 , NULL, :teacher_id , :subject_name)";
                $query = $this->db->prepare($sql);
                $query->execute(array(
                        ':teacher_id' => $teacher_id,        
                        ':body' => $body1,
                        ':subject_name' =>$tmp->subject_name
                ));

                
                $sql = "SELECT `id` FROM `notification` ORDER by id DESC LIMIT 1";
                $query = $this->db->prepare($sql);
                $query->execute(array());
                $last_notification_id = $query ->fetchAll();


                $sql = "INSERT INTO `user_notification` (id, recipient_id, notification_id)
                        VALUES (NULL, :recipient_id , :notification_id)";
                $query = $this->db->prepare($sql);
                $query->execute(array(
                        ':recipient_id' => $tmp->student_user_id,        
                        ':notification_id' => $last_notification_id[0]->id
                        ));
        }


        
        $sql =" SELECT `name` FROM `subject`
                WHERE id = :subject_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
                ':subject_id' => $subject_id));
        $subject_name = $query->fetchAll();



        $body2 = 'have APPROVED your session request on course ';
        $sql = "SELECT student_user_id FROM student_session JOIN session on (session.id = session_id)
                WHERE teacher_availability_id = :te_ava_id
                AND subject_id = :subject_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
                ':subject_id' => $subject_id,
                ':te_ava_id' => $te_ava_id
        ));
        $approved_students = $query -> fetchAll();

        foreach ($approved_students as $tmp){
                $sql = "INSERT INTO `notification` (id, header, body, seen , seen_date, sender_id , subject_name)
                        VALUES (NULL, 'Teacher Response' , :body , 0 , NULL, :teacher_id , :subject_name)";
                $query = $this->db->prepare($sql);
                $query->execute(array(
                        ':teacher_id' => $teacher_id,        
                        ':body' => $body2,
                        ':subject_name' => $subject_name[0]->name
                ));

                
                $sql = "SELECT `id` FROM `notification` ORDER by id DESC LIMIT 1";
                $query = $this->db->prepare($sql);
                $query->execute(array());
                $last_notification_id = $query ->fetchAll();


                $sql = "INSERT INTO `user_notification` (id, recipient_id, notification_id)
                        VALUES (NULL, :recipient_id , :notification_id)";
                $query = $this->db->prepare($sql);
                $query->execute(array(
                        ':recipient_id' => $tmp->student_user_id,        
                        ':notification_id' => $last_notification_id[0]->id
                        ));
        }
    }

    public function getUserNotifications($id){
        $sql = "SELECT * FROM `user_notification` WHERE recipient_id = :id";
        
        $query = $this->db->prepare($sql);
        $query->execute(array(       
                ':id' => $id
            ));
        return  $query->fetchAll();
    }

    public function getNewNotifications($id){
        $sql = "SELECT * FROM `user_notification` JOIN `notification` on (notification.id = notification_id)
                WHERE recipient_id = :id AND seen = 0 
                ORDER BY notification_id DESC";
        
        $query = $this->db->prepare($sql);
        $query->execute(array(       
                ':id' => $id
            ));

        return  $query->fetchAll();
    }

    public function getNotificationDetails($id){

        $sql = "SELECT `header`, `body`, `seen`, `subject_name` ,`seen_date`, user.first_name as f_name, img_url , user.last_name as l_name , `send_date`
                FROM `notification` join `user`  
                WHERE sender_id = user.id
                AND notification.id = :id";
        
        $query = $this->db->prepare($sql);
        $query->execute(array(       
                ':id' => $id
                ));
                
        return  $query->fetchAll();
    }


    public function setNotificationSeen($id){
        $sql = "UPDATE `notification`
                set seen = 1
                WHERE id = :id" ;

        $query = $this->db->prepare($sql);
        $query->execute(array(       
                ':id' => $id
        ));
    }

    public function setUserNotificationsSeen($id){
        $sql = "UPDATE `notification`JOIN `user_notification` on(notification.id = user_notification.notification_id)
                SET `seen`= 1
                WHERE user_notification.recipient_id=:id";
        $query = $this->db->prepare($sql);
        $query->execute(array(       
                ':id' => $id
            ));
    }


}