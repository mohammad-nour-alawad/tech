<?php

class availabilityModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function addAvailability($id,$from, $to, $date ,$is_closed)
    {
        $id = strip_tags($id);
        $from = strip_tags($from);
        $to = strip_tags($to);
        $date  = strip_tags($date);
        $is_closed = strip_tags($is_closed);


        $sql = "INSERT INTO `availability` (`id`, `date`, `from`, `to`) VALUES (NULL, :date , :from, :to)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
                ':from' => $from,
                ':to' => $to,
                ':date' => $date));
        

        $sql = "SELECT id FROM `availability` WHERE `from` = :from AND `to` = :to AND `date` = :date";
        $query = $this->db->prepare($sql);
        $query->execute(array( ':from' => $from,
                               ':to' => $to,
                               ':date' => $date));


        $newAva = $query->fetchAll();

        $av_id = $newAva[0]->id;

        $sql = "INSERT INTO `teacher_availability` (`id`, `teacher_user_id` , `availability_id`, `is_availability_closed`)
                VALUES (NULL , :id ,:av_id , :is_closed)";
    
        $query = $this ->db->prepare($sql);
        $query->execute(array(
                ':id' => $id,
                ':av_id' => $av_id,
                ':is_closed' => $is_closed
        ));
    }


    public function getTeacherAvailability($id){
        $sql = "SELECT *,teacher_availability.id as t_ava_id
                FROM `teacher` join `teacher_availability` on (teacher_user_id = user_id)
                               join `availability` on (availability.id = availability_id)
                WHERE teacher_user_id = :id
                AND is_availability_closed = 0";
    $query = $this->db->prepare($sql);
    $query->execute(array(':id' => $id));
    return $query->fetchAll();
    }


    public function getTeacherAvailabilityEvenClosedOnes($id , $date){
        $sql = "SELECT *,teacher_availability.id as t_ava_id
                FROM `teacher_availability` join `availability` on (availability.id = availability_id)
                WHERE teacher_user_id = :id
                AND `date` = :date";
    $query = $this->db->prepare($sql);
    $query->execute(array(':id' => $id, ':date'=> $date));
    return $query->fetchAll();
    }

}