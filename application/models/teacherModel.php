<?php

class teacherModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    public function getTeachers() {
        $sql = "SELECT user_id, user.first_name, user.last_name, user.img_url
                from teacher, user
                WHERE user_id = user.id ";

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getTopTeachers() {
        $sql = "SELECT teacher_user_id, COUNT(*)
                from session, subject
                GROUP BY teacher_user_id ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getTeacherRates($id) {
        $sql = "SELECT rate FROM `student_session` JOIN `session` on (student_session.session_id = session.id)
                JOIN `subject` on (session.subject_id = subject.id)
                WHERE `subject`.`teacher_user_id` = :id AND rate!=0 ";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id'=>$id));
        
        return $query->fetchAll();
    }
    
}
