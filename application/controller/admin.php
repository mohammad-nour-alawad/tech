<?php
if ( session_status() !== PHP_SESSION_ACTIVE )
session_start();
class admin extends Controller
{
    public function index(){
        if(isset($_COOKIE['user']))
        {
            $userModel = $this->loadModel("userModel");
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }
        if(isset($_SESSION['user']) && $_SESSION['user']->role == "admin"){
            $teacherModel = $this->loadModel("teacherModel");
            $studentModel = $this->loadModel("studentModel");
            $sessionModel = $this->loadModel("sessionModel");
            $courseModel = $this->loadModel("courseModel");
            $availabilityModel = $this->loadModel("availabilityModel");
            $notificationModel = $this->loadModel("notificationModel");

            require 'application/views/_templates/admin-header.php';
            require 'application/views/admin/index.php';
            require 'application/views/_templates/footer.php';
        }
        else{
            $error_msg = "YOU DONT HAVE ENOUGH PERMISSIONS TO ACCESS ADMIN PAGES";
            require 'application/views/_templates/home-header.php';
            require 'application/views/home/index.php';
            require 'application/views/error/index.php';
            require 'application/views/_templates/footer.php';
        }
    }


    public function users(){
        if(isset($_COOKIE['user']))
        {
            $userModel = $this->loadModel("userModel");
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }
        
        if(isset($_SESSION['user']) && $_SESSION['user']->role == "admin"){
            $teacherModel = $this->loadModel("teacherModel");
            if(!isset($_COOKIE['user']))
                $userModel = $this->loadModel("userModel");
            $studentModel = $this->loadModel("studentModel");
            $sessionModel = $this->loadModel("sessionModel");
            $courseModel = $this->loadModel("courseModel");
            $availabilityModel = $this->loadModel("availabilityModel");
            $notificationModel = $this->loadModel("notificationModel");

            $users = $userModel->getAllUsers();
            require 'application/views/_templates/admin-header.php';
            require 'application/views/admin/users.php';
            require 'application/views/_templates/footer.php';
        }
        else{
            $error_msg = "YOU DONT HAVE ENOUGH PERMISSIONS TO ACCESS ADMIN PAGES";
            require 'application/views/_templates/home-header.php';
            require 'application/views/home/index.php';
            require 'application/views/error/index.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function sessions(){
        
        if(isset($_COOKIE['user']))
        {
            $userModel = $this->loadModel("userModel");
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }

        if(isset($_SESSION['user']) && $_SESSION['user']->role == "admin"){
            $teacherModel = $this->loadModel("teacherModel");
            if(!isset($_COOKIE['user']))
                $userModel = $this->loadModel("userModel");
            $studentModel = $this->loadModel("studentModel");
            $sessionModel = $this->loadModel("sessionModel");
            $courseModel = $this->loadModel("courseModel");
            $availabilityModel = $this->loadModel("availabilityModel");
            $notificationModel = $this->loadModel("notificationModel");


            $sessions = $sessionModel->getAllsessions();
            require 'application/views/_templates/admin-header.php';
            require 'application/views/admin/sessions.php';
            require 'application/views/_templates/footer.php';
        }
        else{
            $error_msg = "YOU DONT HAVE ENOUGH PERMISSIONS TO ACCESS ADMIN PAGES";
            require 'application/views/_templates/home-header.php';
            require 'application/views/home/index.php';
            require 'application/views/error/index.php';
            require 'application/views/_templates/footer.php';
        }
    }
}