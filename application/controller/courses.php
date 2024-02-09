<?php
if ( session_status() !== PHP_SESSION_ACTIVE )
session_start();

class Courses extends Controller
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
        $availabilityModel = $this->loadModel("availabilityModel");
                
        require 'application/views/_templates/info-header.php';
        require 'application/views/courses/index.php';
        require 'application/views/_templates/right-sidebar.php';
        require 'application/views/_templates/footer.php';
    }

    public function profileCourses()
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
        require 'application/views/courses/profile_courses.php';
        require 'application/views/_templates/footer.php';
    }
    public function courseDetails($id) {
        $teacherModel = $this->loadModel("teacherModel");
        $studentModel = $this->loadModel("studentModel");
        $notificationModel = $this->loadModel("notificationModel");
        $courseModel = $this->loadModel("courseModel");
        
        require 'application/views/_templates/info-header.php';
        require 'application/views/courses/course-details.php';
        require 'application/views/_templates/right-sidebar.php';
        require 'application/views/_templates/footer.php';
    }
    
    public function courseDetailsFromProfile($id)
    {
        if(isset($_COOKIE['user']))
        {
            $userModel = $this->loadModel("userModel");
            $user = $userModel->findUserById($_COOKIE['user']);
            $_SESSION['user'] = $user[0];
        }
        $teacherModel = $this->loadModel("teacherModel");
        $studentModel = $this->loadModel("studentModel");
        $notificationModel = $this->loadModel("notificationModel");
        $courseModel = $this->loadModel("courseModel");
        
        require 'application/views/_templates/logged-in-header.php';
        require 'application/views/_templates/left-sidebar.php';
        require 'application/views/courses/profile-course-details.php';
        require 'application/views/_templates/right-sidebar.php';
        require 'application/views/_templates/footer.php';
    }
    
    public function myCourses(){
        
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

        require 'application/views/_templates/logged-in-header.php';
        require 'application/views/_templates/left-sidebar.php';
        require 'application/views/courses/my-courses.php';
        require 'application/views/_templates/right-sidebar.php';
        require 'application/views/_templates/footer.php';
    }

    public function newCourse(){
        
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

        require 'application/views/_templates/logged-in-header.php';
        require 'application/views/_templates/left-sidebar.php';
        require 'application/views/courses/new-Subject.php';
        require 'application/views/_templates/right-sidebar.php';
        require 'application/views/_templates/footer.php';
    }

    public function checkNewCourse(){                       /* NEEDS SOME CHECK !!!*/
     
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

        if (isset($_POST["submit_course"])){
            if ($_POST['title'] == ""){
                $error_msg = "Course Name must be set !!";
                require 'application/views/_templates/logged-in-header.php';
                require 'application/views/_templates/left-sidebar.php';
                require 'application/views/courses/new-Subject.php';
                require 'application/views/error/index.php';
                require 'application/views/_templates/right-sidebar.php';
                require 'application/views/_templates/footer.php';
            }
            else{
                $oldcourses = $courseModel->getTeacherCourses($_SESSION['user']->id);
                $ok = true;
                foreach ($oldcourses as $tmp)
                {
                    if ($tmp->name == $_POST['title']){   
                        $ok = false;     
                    }
                }
                if ($ok) {
                    $courseModel->addCourse($_SESSION['user']->id,
                                            $_POST['title'],
                                            $_POST['category'],
                                            $_POST['classification'],
                                            $_POST['description'],
                                            $_POST['course_img_url']);
                    
                    header("location: " . URL . "users/profile/" . $_SESSION['user']->id);
                }
                else{
                    $error_msg = "You already have a course with the same name !!";
                    require 'application/views/_templates/logged-in-header.php';
                    require 'application/views/_templates/left-sidebar.php';
                    require 'application/views/courses/new-Subject.php';
                    require 'application/views/error/index.php';
                    require 'application/views/_templates/right-sidebar.php';
                    require 'application/views/_templates/footer.php';
                }
            }
        }
    }
}