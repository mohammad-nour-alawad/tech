<?php
if ( session_status() !== PHP_SESSION_ACTIVE)
session_start();

class Login extends Controller
{
    public function index()
    {
        $teacherModel = $this->loadModel("teacherModel");
        $studentModel = $this->loadModel("studentModel");
        if(!isset($_SESSION['user']) ){
            require 'application/views/_templates/info-header.php';
            require 'application/views/login/index.php';
            require 'application/views/_templates/right-sidebar.php';
            require 'application/views/_templates/footer.php';
        }
        else {
            header("location: " . URL . "users/profile/" . $_SESSION['user']->id);
        }
    }
    
    public function checkLogin()
    {
        if (isset($_POST['submit-login'])) {
            $user_model = $this->loadModel('userModel');
            $res = $user_model->findUserByEmail($_POST['email']);    
            $teacherModel = $this->loadModel("teacherModel");
            $studentModel = $this->loadModel("studentModel");
            
            $flag = false;
            $error_msg = "No such smail, please try again !!";
            foreach($res as $tmp) {
                if(md5($_POST['password']) == $tmp->password_hash) {
                    $flag = true;
                }
                else{
                    $error_msg = "Wrong password, please try again !!";
                }
            }
            
            if ($flag)
            {
                session_start();
                $_SESSION['user']=$res[0];
                if (isset($_POST['remember']))
                    setcookie('user', $res[0] -> id , time() + (86400 * 30), "/");
                header("location: " . URL . "users/profile/" . $_SESSION['user']->id);
            }
            else {
                require 'application/views/_templates/info-header.php';
                require 'application/views/login/index.php';
                require 'application/views/error/index.php';
                require 'application/views/_templates/right-sidebar.php';
                require 'application/views/_templates/footer.php';
            }   
        }
    }
}