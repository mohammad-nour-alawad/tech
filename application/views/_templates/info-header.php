<?php 
  if (session_status()!=PHP_SESSION_ACTIVE)
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/table.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/bootstrap-3.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/DataTables-1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/header.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/header-footer-rightsidebar.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/table-with-header-footer-rightsidebar.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/login.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/register.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/login-register.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/courseDetails.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/rating.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/contact.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/about.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/notification.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/allusers.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/error.css">



    <?php if (isset($_SESSION['user'])) { ?>
    <style>
    .nav-items li {
        display: inline-block;
        box-sizing: border-box;
        margin-top: -4px;
    }
    </style>
    <?php } ?>
    <title>Home</title>
</head>

<body>
    <header>
        <?php if (!isset($_SESSION['user'])) { ?>
        <nav class="nav" id="nav" onscroll="light()">
            <div class="navbar navbar-fixed">
                <div class="logo">
                    <a href="<?php echo URL; ?>">
                        <p><span>T</span>ech</p>
                    </a>
                </div>


                <ul class="nav-items tmp-lg" style="margin-top: 17px;">
                    <li class="mid-nav"><a href="<?php echo URL; ?>home/index">Home</a></li>
                    <li class="mid-nav"><a href="<?php echo URL; ?>info/about">About</a></li>
                    <li class="mid-nav"><a href="<?php echo URL; ?>courses">Courses</a></li>
                    <li class="mid-nav"><a href="<?php echo URL; ?>info/contact">Contact</a></li>
                    
                    <li><a href="<?php echo URL; ?>login/"><input type="button" value="Sign-in" id="sign-in"></a></li>
                    <li><a href="<?php echo URL; ?>register/"><input type="button" value="Sign-up" id=sign-up></a></li>
                </ul>
            </div>
            <?php } else { ?>

            <nav class="nav" id="nav" onscroll="light()">

                <div class="navbar navbar-fixed">
                    <div class="logo">
                        <a href="<?php echo URL;?>">
                            <p><span>T</span>ech</p>
                        </a>
                    </div>


                    <?php if ($_SESSION['user']->role != "admin") { ?>
                    <div class="notification-container">
                        <div class="counter">
                            <label for="" class="count">
                            </label>
                        </div>
                        <button class="noti-button" type="submit" onclick="" href="">
                            <i class="fa fa-bell-o" id="noti-icon"></i>
                            <div class="new-notifications">
                                <ul class="notification-menu">
                                </ul>
                                <h5> <a href="<?php echo URL; ?>notification"> see all notifications <i
                                            class="fa fa-arrow-right"></i> </a> </h5>
                            </div>
                        </button>
                    </div>
                    <?php } ?>

                    <div class="homepage-logout">
                        <a href="<?php echo URL;?>">
                            <form class="logout" name="logout" action="<?php echo URL; ?>logout/log_out" method="POST">
                                <button type='submit' name="submit-logout"
                                    style="background: transparent; border: none; outline: none;">
                                    <img src="<?php echo URL; ?>public/icons/logout-icon.png" alt="">
                                </button>
                            </form>
                        </a>
                        <div class="nav-username">
                            <a href="<?php echo URL;?>users/profile/<?php echo $_SESSION['user']->id;?>">
                                <span>
                                    <?php
                                    echo $_SESSION['user']->first_name;
                                    ?>
                                </span>
                            </a>
                        </div>
                        <div class="nav-profile">
                            <a href="<?php echo URL;?>users/profile/<?php echo $_SESSION['user']->id;?>">
                                <img src="<?php echo URL; ?>public/profile-pics/<?php echo $_SESSION['user']->img_url; ?>"
                                    alt="profile">
                            </a>
                        </div>
                    </div>
                    <ul class="nav-items tmp-lg" style="padding-left:30px; padding-top:10px">
                        <li class="mid-nav"><a href="<?php echo URL; ?>home/index">Home</a></li>
                        <li class="mid-nav"><a href="<?php echo URL; ?>users/allUsers">All users</a></li>
                        <li class="mid-nav"><a href="<?php echo URL; ?>info/about">About</a></li>
                        <li class="mid-nav"><a href="<?php echo URL; ?>courses">Courses</a></li>
                        <li class="mid-nav"><a href="<?php echo URL; ?>info/contact">Contact</a></li>
                    </ul>
                </div>
            </nav>
            <?php } ?>


            <input type="checkbox" id="check">
            <label for="check">
                <i class="fa fa-bars" id="sidebar-btn"></i>
                <i class="fa fa-times" id="sidebar-cancel"></i>
            </label>
            <div class="sidebar">
                <a href="<?php echo URL; ?>home"> <span>HOME</span> </a>
                <a href="<?php echo URL; ?>Info/about"><span>ABOUT</span> </a>
                <a href="<?php echo URL; ?>courses"><span>COURSES</span> </a>
                <a href="<?php echo URL; ?>Info/contact"><span>CONTACT</span> </a>
                <?php if (isset($_SESSION['user'])) { ?>
                <a href="<?php echo URL; ?>users/profile/<?php echo $_SESSION['user']->id;?>"><span>PROFILE</span></a>
                <?php } else { ?>
                <a href="<?php echo URL; ?>login"><span>LOG IN</span> </a>
                <a href="<?php echo URL; ?>register"><span>REGISTER</span> </a>
                <?php } ?>
            </div>
        </nav>
    </header>