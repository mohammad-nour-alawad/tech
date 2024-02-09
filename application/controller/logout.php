<?php
if ( session_status() !== PHP_SESSION_ACTIVE )
session_start();

class Logout extends Controller
{
    public function log_out()
    {
        if (isset($_POST["submit-logout"])) {
            unset($_SESSION['user']);
            session_destroy();
            setcookie('user', $res[0]->id , time() - 1, "/");
            header('location: ' . URL);
        }
    }
}