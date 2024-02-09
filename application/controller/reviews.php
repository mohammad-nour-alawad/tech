<?php
if ( session_status() !== PHP_SESSION_ACTIVE )
session_start();

class reviews extends Controller
{
    public function index()
    {
        
        $userModel = $this->loadModel("userModel");
        if(isset($_COOKIE['user']))
        {
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }

        $teacherModel = $this->loadModel("teacherModel");
        $studentModel = $this->loadModel("studentModel");

        
        require 'application/views/_templates/logged-in-header.php';
        require 'application/views/_templates/left-sidebar.php';
        require 'application/views/reviews/index.php';
        require 'application/views/_templates/right-sidebar.php';
        require 'application/views/_templates/footer.php';

    }
}