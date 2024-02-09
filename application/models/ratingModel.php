<?php

class ratingModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function addNewRate($student_id, $session_id, $rate, $comment){
        $student_id = strip_tags($student_id);
        $session_id = strip_tags($session_id);
        $rate = strip_tags($rate);
        $comment = strip_tags($comment);

        $sql = "UPDATE `student_session`
                SET `rate`= :rate ,`comment`= :comment
                WHERE student_user_id = :student_id AND session_id = :session_id";
        
        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':rate' => $rate,
            ':comment' => $comment,
            ':student_id' => $student_id,
            ':session_id' => $session_id
        ));
    }

    public function getAllReviews($id){
        $id = strip_tags($id);

        $sql = "SELECT first_name, last_name , img_url , rate, comment, session.topic as topic from student
                JOIN student_session ON (student.user_id = student_session.student_user_id)
                JOIN `session` ON (session.id = student_session.session_id)
                JOIN teacher_availability ON (session.teacher_availability_id = teacher_availability.id)
                JOIN user ON (student.user_id = user.id)
                WHERE teacher_availability.teacher_user_id = :id AND student_session.rate != 0";
        
        $query = $this->db->prepare($sql);
        $query->execute(array(
            ":id" => $id
        ));
        return $query->fetchAll();
    }

}