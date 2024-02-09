<?php
if ( session_status() !== PHP_SESSION_ACTIVE )
session_start();

class Register extends Controller
{
    public function index()
    {
        $teacherModel = $this->loadModel("teacherModel");
        $studentModel = $this->loadModel("studentModel");
        if(isset($_COOKIE['user']))
        {
            $userModel = $this->loadModel("userModel");
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }

        if (!isset($_SESSION['user'])){
            require 'application/views/_templates/info-header.php';
            require 'application/views/register/index.php';
            require 'application/views/_templates/right-sidebar.php';
            require 'application/views/_templates/footer.php';
        }
        else{
            header("location: " . URL . "users/profile/" . $_SESSION['user']->id);
        }
    }

    public function checkRegister()
    {
        if (isset($_POST["submit-register"])) {
            $users_model = $this->loadModel('userModel');
            $teacherModel = $this->loadModel("teacherModel");
            $studentModel = $this->loadModel("studentModel");
            $users = $users_model->findUserByEmail($_POST['email']);
            
            $user = null;
            $flag = false;


            if  (  preg_match("/[A-Za-z]+/", $_POST['first-name'])
                    && strlen($_POST['first-name']) >=3
                    && preg_match("/[A-Za-z]+/", $_POST['last-name'])
                    && strlen($_POST['last-name']) >=3
                    && (strlen($_POST['password']) >7)
                    && preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$_POST['email'])
                )
            {
                $error_msg = "email already exists, try another!";
                foreach ($users as $tmp) {
                    $flag = true;
                    require 'application/views/_templates/info-header.php';
                    require 'application/views/register/index.php';
                    require 'application/views/error/index.php';
                    require 'application/views/_templates/right-sidebar.php';   
                    require 'application/views/_templates/footer.php';
                }
                
                if ($flag === false)
                {
                    $users_model->addUser(NULL,$_POST['first-name'],$_POST['last-name'],  md5($_POST['password']) , $_POST['email'],$_POST['role']);
                    $users = $users_model->findUserByEmail($_POST["email"]);
                    session_start();

                    $_SESSION['user'] = $users[0];
                    header('location: ' . URL . "users/profile/" . $_SESSION['user']->id);
                }
            }
            else {
                $error_msg = "Please fill all the information properly !!!";
                require 'application/views/_templates/info-header.php';
                require 'application/views/register/index.php';
                require 'application/views/error/index.php';
                require 'application/views/_templates/right-sidebar.php';   
                require 'application/views/_templates/footer.php';
            }
        }
    }
}