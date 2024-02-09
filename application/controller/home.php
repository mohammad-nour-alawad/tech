<?php
if ( session_status() !== PHP_SESSION_ACTIVE )
session_start();

class Home extends Controller
{
    public function index()
    {
        if(isset($_COOKIE['user']))
        {
            $userModel = $this->loadModel("userModel");
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }
        require 'application/views/_templates/home-header.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }
}