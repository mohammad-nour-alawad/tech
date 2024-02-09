<?php
if ( session_status() !== PHP_SESSION_ACTIVE )
session_start();

class Info extends Controller
{
    public function about()
    {
        if(isset($_COOKIE['user']))
        {
            $userModel = $this->loadModel("userModel");
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }
        $teacherModel = $this->loadModel("teacherModel");
        $studentModel = $this->loadModel("studentModel");
        require 'application/views/_templates/info-header.php';
        require 'application/views/info/about.php';
        require 'application/views/_templates/right-sidebar.php';
        require 'application/views/_templates/footer.php';
        
    }
    public function contact()
    {
        if(isset($_COOKIE['user']))
        {
            $userModel = $this->loadModel("userModel");
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }
        $teacherModel = $this->loadModel("teacherModel");
        $studentModel = $this->loadModel("studentModel");
        require 'application/views/_templates/info-header.php';
        require 'application/views/info/contact.php';
        require 'application/views/_templates/right-sidebar.php';
        require 'application/views/_templates/footer.php';
    }
    
}