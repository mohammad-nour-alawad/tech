<?php
if ( session_status() !== PHP_SESSION_ACTIVE )
session_start();

class notification extends Controller
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
        $courseModel = $this->loadModel("courseModel");
        $notificationModel = $this->loadModel("notificationModel");
        $availabilityModel = $this->loadModel("availabilityModel");

        require 'application/views/_templates/logged-in-header.php';
        require 'application/views/_templates/left-sidebar.php';
        require 'application/views/notification/index.php';
        require 'application/views/_templates/right-sidebar.php';
        require 'application/views/_templates/footer.php';
    }


    public function getNotifications() {
        $notificationModel = $this->loadModel("notificationModel");
        $ids = $notificationModel->getNewNotifications($_SESSION['user']->id);
        $notifications = array("notifications"=>array());
        
        foreach($ids as $id){
            $single=$notificationModel->getNotificationDetails($id->notification_id);
            array_push($notifications["notifications"], $single[0]);
        }
        
        echo json_encode($notifications);
    }

    
    public function setNotificationsSeen($id) {
        $notificationModel = $this->loadModel("notificationModel");
        $ids = $notificationModel->getUserNotifications($_SESSION['user']->id);
        $notifications = array("notifications"=>array());
        foreach($ids as $id){
            $single=$notificationModel->getNotificationDetails($id->notification_id);
            array_push($notifications["notifications"], $single[0]);
        }
        $notificationModel->setUserNotificationsSeen($_SESSION['user']->id);
        echo json_encode($notifications);
    }
}
