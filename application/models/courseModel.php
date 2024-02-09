<?php


class courseModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function addCourse($id, $title, $category, $classification, $description, $course_img_url)
    {
        $id = strip_tags($id);
        $title = strip_tags($title);
        $category = strip_tags($category);
        $classification  = strip_tags($classification);
        $description = strip_tags($description);
        $course_img_url = strip_tags($course_img_url);

        $sql = "INSERT INTO `subject` (id, `name`, `description`, teacher_user_id, category, classification, course_img_url)
        VALUES (NULL, :title, :description ,:id, :category , :classification, :course_img_url)";


        $query = $this->db->prepare($sql);
        $query->execute(array(
                ':title' => $title ,
                ':description' => $description,
                ':id' => $id,
                ':classification' => $classification,
                ':category' => $category,
                ':course_img_url' => $course_img_url));
        }

    public function getAllCourses(){
        $sql = "SELECT *,subject.id as sub_id FROM `subject`
                join `teacher` ON(teacher_user_id=teacher.user_id)
                join `user` on (teacher.user_id = user.id)";
        $query = $this->db->prepare($sql);
        $query->execute(array());
        return $query->fetchAll();
    }


    public function getTeacherCourses($id){
        $sql = "SELECT * FROM `subject`
                WHERE teacher_user_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
                ':id' => $id
        ));
        return $query->fetchAll();   
    }

    public function getCourseDetails($id){
        $sql = "SELECT * FROM `subject` WHERE id = :id ";
        $query = $this->db->prepare($sql);
        $query->execute(array());
        return $query->fetchAll();
    }
    
}