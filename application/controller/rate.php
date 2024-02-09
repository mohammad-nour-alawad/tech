<?php
if ( session_status() !== PHP_SESSION_ACTIVE )
session_start();

class rate extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {

    }

    public function rateSession(){
        $ratingModel = $this->loadModel("ratingModel");
        $ratingModel -> addNewRate($_SESSION['user']->id, $_POST["session_id"] , $_POST['rate'] , $_POST['comment']);
        $notificationModel = $this->loadModel("notificationModel");
        $notificationModel -> addNewTeacherNotificaton($_SESSION['user']->id, $_POST['te_ava_id'] , $_POST['subject_id'] , 2);

        header('location: ' . URL . 'users/profile/' . $_SESSION['user']->id);
    }

}