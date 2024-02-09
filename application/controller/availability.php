<?php
if ( session_status() !== PHP_SESSION_ACTIVE )
    session_start();
class availability extends Controller
{
    public function addAvailability()
    {    
        if(isset($_COOKIE['user']))
        {
            $userModel = $this->loadModel("userModel");
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }
        $notificationModel = $this->loadModel("notificationModel");
        $teacherModel = $this->loadModel("teacherModel");
        $studentModel = $this->loadModel("studentModel");
        $courseModel = $this->loadModel("courseModel");
        
        $error_msg = "invalid availability, please try again !!!";

        if (isset($_POST["submit-availability"])) {
            
            $availabilityModel = $this -> loadModel('availabilityModel');

            $from = (int) ($_POST['from']);
            $to = (int) ($_POST['to']);
            $date = $_POST['date'];
            $time = (date("H")+2)*60+date("i");
            if (date("Y-m-d")>$date || (date("Y-m-d") == $date && ($from<$time || $from>=$to))
                || (date("Y-m-d") < $date && $from>=$to)) {
                    require 'application/views/_templates/logged-in-header.php';
                    require 'application/views/error/index.php';
                    require 'application/views/_templates/left-sidebar.php';
                    require 'application/views/availability/addAvailability.php';
                    require 'application/views/_templates/right-sidebar.php';
                    require 'application/views/_templates/footer.php';
            }
            else {

                $oldAvailabilities = $availabilityModel->getTeacherAvailabilityEvenClosedOnes($_SESSION['user']->id,$date);
                $ok = true;

                foreach($oldAvailabilities as $tmp){
                    if (!($from>=$tmp->to || $to<=$tmp->from))
                        $ok = false;
                }

                if ($ok){
                    $isclosed = 0;
                    $availabilityModel->addAvailability($_SESSION['user']->id , $from, $to, $_POST['date'] , $isclosed);
                    header ("location: " . URL . "users/profile/" . $_SESSION['user']->id);
                }
                else {
                    $error_msg = "Availability already exists, please try another !!!";
                    
                    require 'application/views/_templates/logged-in-header.php';
                    require 'application/views/error/index.php';
                    require 'application/views/_templates/left-sidebar.php';
                    require 'application/views/availability/addAvailability.php';
                    require 'application/views/_templates/right-sidebar.php';
                    require 'application/views/_templates/footer.php';
                }
            }
        }
    }

    public function newAvailability(){
        
        if(isset($_COOKIE['user']))
        {
            $userModel = $this->loadModel("userModel");
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }

        $teacherModel = $this->loadModel("teacherModel");
        $studentModel = $this->loadModel("studentModel");
        $courseModel = $this->loadModel("courseModel");
        $availabilityModel = $this->loadModel("availabilityModel");
        $notificationModel = $this->loadModel("notificationModel");

        require 'application/views/_templates/logged-in-header.php';
        require 'application/views/_templates/left-sidebar.php';
        require 'application/views/availability/addAvailability.php';
        require 'application/views/_templates/right-sidebar.php';
        require 'application/views/_templates/footer.php';
    }
}