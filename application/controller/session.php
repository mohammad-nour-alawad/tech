<?php
if ( session_status() !== PHP_SESSION_ACTIVE )
session_start();

class Session extends Controller
{
    public function index()
    {
        if(isset($_COOKIE['user']))
        {
            $userModel = $this->loadModel("userModel");
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }
        $teacherModel = $this->loadModel("teacherModel");
        $studentModel = $this->loadModel("studentModel");
        $sessionModel = $this->loadModel("sessionModel");
        $notificationModel = $this->loadModel("notificationModel");
        $availabilityModel = $this->loadModel("availabilityModel");

        require 'application/views/_templates/logged-in-header.php';
        require 'application/views/_templates/left-sidebar.php';
        require 'application/views/sessions/sessionRequest.php';
        require 'application/views/_templates/footer.php';

    }

    public function requestSession()
    {
        $userModel = $this->loadModel("userModel");
        $teacherModel = $this->loadModel("teacherModel");
        $studentModel = $this->loadModel("studentModel");
        $sessionModel = $this->loadModel("sessionModel");
        $notificationModel = $this->loadModel("notificationModel");
        $availabilityModel = $this->loadModel("availabilityModel");
        $courseModel = $this->loadModel("courseModel");
        
        if(isset($_COOKIE['user']))
        {
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }

        if (isset($_POST['submit-session-req'])) {

            if (isset($_SESSION['user']))
            {
                $ok = $sessionModel->requestSession($_SESSION['user']->id , $_POST['te-ava-id'], $_POST['subject-id']);
                if ($ok) {
                    $notificationModel -> addNewTeacherNotificaton($_SESSION['user']->id, $_POST['te-ava-id'] , $_POST['subject-id'] , 1);
                    header ('location: ' . URL . 'users/profile/' . $_SESSION['user']->id);
                }
                else{
                    $error_msg = "You already requested the selected session session!!!";
                    require 'application/views/_templates/info-header.php';
                    require 'application/views/courses/index.php';
                    require 'application/views/error/index.php';
                    require 'application/views/_templates/right-sidebar.php';
                    require 'application/views/_templates/footer.php';
                }
            }

            else {         
                require 'application/views/_templates/info-header.php';
                require 'application/views/login/login-register.php';
                require 'application/views/_templates/right-sidebar.php';
                require 'application/views/_templates/footer.php';
            }
        }
    }

    public function requestSessionProfile()
    {
        $teacherModel = $this->loadModel("teacherModel");
        $studentModel = $this->loadModel("studentModel");
        $sessionModel = $this->loadModel("sessionModel");
        $notificationModel = $this->loadModel("notificationModel");
        $availabilityModel = $this->loadModel("availabilityModel");
        $courseModel = $this->loadModel("courseModel");

        if(isset($_COOKIE['user']))
        {
            $userModel = $this->loadModel("userModel");
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }

        if (isset($_POST['submit-session-req']))
        {
            if (isset($_SESSION['user'])) {
                $ok = $sessionModel->requestSession($_SESSION['user']->id , $_POST['te-ava-id'], $_POST['subject-id']);
                if ($ok) {
                    $notificationModel -> addNewTeacherNotificaton($_SESSION['user']->id, $_POST['te-ava-id'] , $_POST['subject-id'] , 1);
                    header ('location: ' . URL . 'users/profile/' . $_SESSION['user']->id);
                }
                else{
                    $error_msg = "You already requested the selected session session!!!";
                    require 'application/views/_templates/logged-in-header.php';
                    require 'application/views/_templates/left-sidebar.php';
                    require 'application/views/courses/profile_courses.php';
                    require 'application/views/error/index.php';
                    require 'application/views/_templates/footer.php';
                }
            }
            else{
                require 'application/views/_templates/info-header.php';
                require 'application/views/login/login-register.php';
                require 'application/views/_templates/right-sidebar.php';
                require 'application/views/_templates/footer.php';
            }
        }
    }

    public function approveForm(){

        if(isset($_COOKIE['user']))
        {
            $userModel = $this->loadModel("userModel");
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }

        $teacherModel = $this->loadModel("teacherModel");
        $studentModel = $this->loadModel("studentModel");
        $sessionModel = $this->loadModel("sessionModel");
        $notificationModel = $this->loadModel("notificationModel");
        $availabilityModel = $this->loadModel("availabilityModel");

            if (isset($_POST['approve-this-session'])){
                $_SESSION['user']->teacher_availablity_id = $_POST['teacher-ava-id'];
                $_SESSION['user']->subject_id = $_POST['sub-id'];
            }
            
            if ($_SESSION['user']->role == "admin") {
                require 'application/views/_templates/admin-header.php';
            }
            else {
                require 'application/views/_templates/logged-in-header.php';
            }
            require 'application/views/_templates/left-sidebar.php';
            require 'application/views/sessions/handelSessions.php';
            require 'application/views/_templates/footer.php';
    }


    public function approveSession(){

        if(isset($_COOKIE['user']))
        {
            $userModel = $this->loadModel("userModel");
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }
        
        $teacherModel = $this->loadModel("teacherModel");
        $studentModel = $this->loadModel("studentModel");
        $sessionModel = $this->loadModel("sessionModel");
        $availabilityModel = $this->loadModel("availabilityModel");
        $notificationModel = $this->loadModel("notificationModel");

        if (isset($_POST["submit-approve"])){
            $sessionModel->adjustSessions($_POST["title"] , $_POST['reject-reason'] , $_POST['sub-id'] , $_POST['teacher-ava-id']);
            $notificationModel -> addNewStudentNotificaton($_SESSION['user']->id , $_POST['sub-id'] , $_POST['teacher-ava-id']);
            if($_SESSION['user']->role == "teacher")
                header('location: ' . URL . 'session');
            else if ($_SESSION['user']->role == "admin")
                header('location: ' . URL . 'admin/sessions');
        }
    }

}
