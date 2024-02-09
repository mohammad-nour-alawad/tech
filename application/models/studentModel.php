<?php

class studentModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    public function getStudents() {
        $sql = "SELECT user_id, user.first_name, user.last_name, user.img_url
                from student, user
                WHERE user_id = user.id ";

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
