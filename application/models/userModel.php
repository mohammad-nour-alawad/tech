<?php


class userModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function addUser($id, $first_name, $last_name, $password_hash, $email, $role)
    {
        $id = strip_tags($id);
        $first_name = strip_tags($first_name);
        $last_name = strip_tags($last_name);
        $password_hash  = strip_tags($password_hash);
        $email = strip_tags($email);
        $role = strip_tags($role);

        $sql = "INSERT INTO user (id, first_name, last_name, password_hash, email, role)
        VALUES (NULL, :first_name, :last_name, :password_hash , :email, :role)";


        $query = $this->db->prepare($sql);
        $query->execute(array(
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':role' => $role ,
                ':email' => $email,
                ':password_hash' => $password_hash));

        $sql = "SELECT id FROM user WHERE email = :email";
        $query = $this->db->prepare($sql);
        $query->execute(array(':email' => $email));
        $newUser = $query->fetchAll();

        foreach ($newUser as $tmp) {
            if ($role == "teacher"){
                $sql = "INSERT INTO teacher (user_id)
                        VALUES (:user_id)";
                $query = $this->db->prepare($sql);
                $query->execute(array(':user_id' => $tmp->id));    
            }
            else{        
                $sql = "INSERT INTO student (user_id)
                        VALUES (:user_id)";
                $query = $this->db->prepare($sql);
                $query->execute(array(':user_id' => $tmp->id));
            }
        }
    }


    
    public function findUserByEmail($email){
        $sql = "SELECT  id,
                        first_name,
                        last_name,
                        img_url, 
                        role,
                        bio,
                        mobile_number,
                        is_active,
                        birthday,
                        gender, 
                        email, 
                        password_hash, 
                        facebook_url, 
                        facebook_token
                from user
                WHERE email = :email";
        $query = $this->db->prepare($sql);
        $query->execute(array(':email' => $email));
        return $query->fetchAll();
    }

    public function findUserById($id){
        $sql = "SELECT  id,
                        first_name,
                        last_name,
                        img_url, 
                        role,
                        bio,
                        mobile_number,
                        is_active,
                        birthday,
                        gender, 
                        email, 
                        password_hash, 
                        facebook_url, 
                        facebook_token
                from user
                WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
        return $query->fetchAll();
    }

    
    public function editProfile($id, $first_name, $last_name, $img_url, $bio, $mobile_number, $birthday, $gender, $facebook_url)
    {
        $id = strip_tags($id);
        $first_name = strip_tags($first_name);
        $last_name = strip_tags($last_name);
        $img_url = strip_tags($img_url);
        $bio = strip_tags($bio);
        $mobile_number = strip_tags($mobile_number);
        $birthday = strip_tags($birthday);
        $gender = strip_tags($gender);
        $facebook_url = strip_tags($facebook_url);

        $sql = "UPDATE user
        SET first_name = :first_name, 
            last_name = :last_name,
            img_url = :img_url,
            bio = :bio,
            mobile_number = :mobile_number,
            birthday = :birthday,
            gender = :gender,
            facebook_url = :facebook_url
        WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array( ':id' => $id, ':first_name' => $first_name, ':last_name' => $last_name, ':img_url' => $img_url, ':bio' => $bio, ':mobile_number' => $mobile_number, ':birthday' => $birthday, ':gender' => $gender, ':facebook_url' => $facebook_url));
    }



    
    
    public function updateUser($id, $role ,$first_name, $last_name, $email, $password_hash, $status, $birthday, $gender)
    {
        $id = strip_tags($id);
        $role = strip_tags($role);
        $first_name = strip_tags($first_name);
        $last_name = strip_tags($last_name);
        $email = strip_tags($email);
        $password_hash = strip_tags($password_hash);
        $status = strip_tags($status);
        $birthday = strip_tags($birthday);
        $gender = strip_tags($gender);

        $sql = "UPDATE `user`
                SET first_name = :first_name, 
                    last_name = :last_name,
                    `role` = :role,
                    email = :email,
                    password_hash =:password_hash,
                    is_active = :status,
                    birthday = :birthday,
                    gender = :gender
                WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(  ':id' => $id,
                                ':first_name' => $first_name,
                                ':last_name' => $last_name,
                                ':role' => $role, 
                                ':email' => $email,
                                ':password_hash' => $password_hash,
                                ':status' => $status,
                                ':birthday' => $birthday, 
                                ':gender' => $gender));
    }

    public function getAllUsers(){
        $sql = "SELECT * FROM `user`";
        $query = $this->db->prepare($sql);
        $query->execute(array());
     
        return $query->fetchAll();
    }


}
