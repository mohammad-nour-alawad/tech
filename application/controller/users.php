<?php
if ( session_status() !== PHP_SESSION_ACTIVE )
session_start();

class Users extends Controller
{

    public function allUsers(){
        $userModel = $this->loadModel('userModel');
        $teacherModel = $this->loadModel('teacherModel');
        $studentModel = $this->loadModel('studentModel');
        $users=$userModel->getAllUsers();
        if (isset($_SESSION['user'])){
            require 'application/views/_templates/info-header.php';
            require "application/views/allUsers/index.php";
            require 'application/views/_templates/right-sidebar.php';
            require 'application/views/_templates/footer.php';
        }
    }



    public function Profile($id)
    {
        $userModel = $this->loadModel('userModel');
        $availabilityModel = $this->loadModel('availabilityModel');
        $teacherModel = $this->loadModel('teacherModel');
        $studentModel = $this->loadModel('studentModel');
        $courseModel = $this->loadModel('courseModel');
        $notificationModel = $this->loadModel("notificationModel");
        $sessionModel = $this->loadModel('sessionModel');
        
        if(isset($_COOKIE['user']))
        {
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }

        $user = $userModel ->findUserById($id);
        
        $found = false;

        $user_id = $id;
        $user_first_name = "";
        $user_last_name = "";
        $user_img_url = "";
        $user_bio = "";
        $user_role = "";
        $user_mobile_number = "";
        $user_birthday = "";
        $user_gender = "";
        $user_facebook_url = "";

        foreach ($user as $tmp){
            $user_id = $id;
            $user_first_name = $tmp->first_name;
            $user_last_name = $tmp->last_name;
            $user_img_url = $tmp->img_url;
            $user_mobile_number = $tmp ->mobile_number;
            $user_birthday = $tmp -> birthday;
            $user_gender = $tmp->gender;
            $user_bio = $tmp->bio;
            $user_role = $tmp->role;
            $user_facebook_url = $tmp->facebook_url;  
            $found = true;  
        }
        if ($found){
            if (isset($_SESSION['user'])){
                require 'application/views/_templates/logged-in-header.php';
                require 'application/views/_templates/left-sidebar.php';
                require "application/views/profile/index.php";
            }
            else {
                require 'application/views/_templates/info-header.php';
                require 'application/views/login/login-register.php';
            }
            require 'application/views/_templates/right-sidebar.php';
            require 'application/views/_templates/footer.php';
        }
        else{
            $error_msg = "There is no user with the selected id !!";
            require 'application/views/_templates/home-header.php';
            require 'application/views/home/index.php';
            require 'application/views/error/index.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function updateUserInfo($id)
    {
        
        $userModel = $this->loadModel("userModel");
        if(isset($_COOKIE['user']))
        {
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }


        if (isset($_SESSION['user']) && $_SESSION['user']->role == "admin"){
            if (isset($_POST['submit-update-user'])){

                $first_name = $_POST['first_name'];
                $email = $_POST['email'];

                $oldInfo = $userModel->findUserById($id);
                $pass = $_POST['password_hash'];
                
                
                if  (  preg_match("/[A-Za-z]+/", $first_name)
                    && strlen($first_name) >=3
                    && (strlen($pass) >7)
                    && preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)
                    )
                {
                    $userModel -> updateUser($id,$_POST['role'],$_POST['first_name'],$_POST['last_name'],$_POST['email'],
                                            ($pass == $oldInfo[0]->password_hash ? $pass : md5($pass)),
                                            $_POST['status'],$_POST['birthday'], $_POST['gender'] ) ;

                    header('location: '. URL . 'admin/users');
                }
                else{
                    $error_msg = "email , password and first name must be set correctly.";
                    $teacherModel = $this->loadModel("teacherModel");
                    $studentModel = $this->loadModel("studentModel");
                    $sessionModel = $this->loadModel("sessionModel");
                    $courseModel = $this->loadModel("courseModel");
                    $availabilityModel = $this->loadModel("availabilityModel");
                    $notificationModel = $this->loadModel("notificationModel");

                    $users = $userModel->getAllUsers();
                    require 'application/views/_templates/admin-header.php';
                    require 'application/views/admin/users.php';
                    require 'application/views/error/index.php';
                    require 'application/views/_templates/footer.php';
                }
            }
        }
        else {
            $error_msg = "YOU DONT HAVE ENOUGH PERMISSIONS TO ACCESS ADMIN PAGES";
            require 'application/views/_templates/home-header.php';
            require 'application/views/home/index.php';
            require 'application/views/error/index.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function editProfile() {
        $userModel = $this->loadModel('userModel');
        $teacherModel = $this->loadModel('teacherModel');
        $studentModel = $this->loadModel('studentModel');
        $notificationModel = $this->loadModel("notificationModel");
        
        $user = $userModel ->findUserById($_SESSION['user']->id);
        
        $found = false;
        $user_first_name = "";
        $user_last_name = "";
        $user_img_url = "";
        $user_bio = "";
        $user_role = "";
        $user_mobile_number = "";
        $user_birthday = "";
        $user_gender = "";
        $user_facebook_url = "";

        foreach ($user as $tmp){
            $user_first_name = $tmp->first_name;
            $user_last_name = $tmp->last_name;
            $user_img_url = $tmp->img_url;
            $user_mobile_number = $tmp ->mobile_number;
            $user_birthday = $tmp -> birthday;
            $user_gender = $tmp->gender;
            $user_bio = $tmp->bio;
            $user_role = $tmp->role;
            $user_facebook_url = $tmp->facebook_url;  
            $found = true;  
        }

        require 'application/views/_templates/logged-in-header.php';
        require 'application/views/_templates/left-sidebar.php';
        
        require "application/views/profile/edit-profile.php";

        require 'application/views/_templates/right-sidebar.php';
        require 'application/views/_templates/footer.php';
    }

    public function updateProfile() {
        $userModel = $this->loadModel('userModel');
        $teacherModel = $this->loadModel('teacherModel');
        $notificationModel = $this->loadModel("notificationModel");
        $studentModel = $this->loadModel('studentModel');

        if ( session_status() !== PHP_SESSION_ACTIVE )
            session_start();
        $user = $userModel ->findUserById($_SESSION['user']->id);
        
        if (isset($_POST['submit-edit'])){
            $user_first_name = "";
            $user_first_name = $_POST['first_name'];
            $user_last_name = "";
            $user_last_name = $_POST['last_name'];
            $user_img_url = "";
            $user_img_url = $_POST['img_url'];
            if($user_img_url == "")
                $user_img_url = $_SESSION['user'] ->img_url;
            $user_bio = "";
            $user_bio = $_POST['bio'];
            $user_role = "";
            $user_role = $_SESSION['user']->role;
            $user_mobile_number = "";
            $user_mobile_number = $_POST['mobile_number'];
            $user_birthday = "";
            $user_birthday = $_POST['birthday'];
            $user_gender = "";
            $user_gender = $_POST['gender'];
            $user_facebook_url = "";
            $user_facebook_url = $_POST['facebook_url'];

            if (strlen($user_first_name)>=3 && preg_match("/[A-Za-z]+/", $_POST['first_name']))
            {    
                foreach ($user as $tmp)
                {
                    $_SESSION['user']->first_name =  $tmp->first_name = $_POST['first_name'] ;
                    $_SESSION['user']->last_name = $tmp->last_name = $_POST['last_name'];
                    $_SESSION['user']->img_url = $tmp->img_url = ($_POST['img_url'] == "" ? $_SESSION['user'] ->img_url : $_POST['img_url']);
                    $_SESSION['user']->mobile_number = $tmp->mobile_number = $_POST['mobile_number'];
                    $_SESSION['user']->birthday = $tmp->birthday = $_POST['birthday'];
                    $_SESSION['user']->gender = $tmp->gender = $_POST['gender'];
                    $_SESSION['user']->bio = $tmp->bio = $_POST['bio'];
                    $_SESSION['user']->facebook_url = $tmp->facebook_url = $_POST['facebook_url'];
                    $userModel -> editProfile($_SESSION['user']->id, $tmp->first_name, $tmp->last_name, $tmp->img_url, $tmp->bio, $tmp->mobile_number, $tmp->birthday, $tmp->gender, $tmp->facebook_url);
                    
                }
                header('location: '. URL . 'users/profile/'. $_SESSION['user']->id);
            }
            else {
                
                $error_msg = "invalid data !!, first name must be longer than 3 characters and contains letters only";
                require 'application/views/_templates/logged-in-header.php';
                require 'application/views/_templates/left-sidebar.php';
                
                require "application/views/profile/edit-profile.php";
                require "application/views/error/index.php";
                require 'application/views/_templates/right-sidebar.php';
                require 'application/views/_templates/footer.php';
            
            }
        }
    }

    public function addNewCourse(){

        $userModel = $this->loadModel('userModel');
        $teacherModel = $this->loadModel('teacherModel');
        $notificationModel = $this->loadModel("notificationModel");
        $studentModel = $this->loadModel('studentModel');

        require 'application/views/_templates/logged-in-header.php';
        require 'application/views/_templates/left-sidebar.php';
        require 'application/views/courses/new-Subject.php';
        require 'application/views/_templates/right-sidebar.php';
        require 'application/views/_templates/footer.php';
    }

    
}