<?php 
  if (session_status()!=PHP_SESSION_ACTIVE)
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/bootstrap-3.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/DataTables-1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/template.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/table-with-header-footer-leftsidebar.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/admin-style.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/table.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/handelSessions.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/error.css">



    <title>tech admin</title>
</head>

<body>
    <header>
        <nav class="nav" id="nav" onscroll="light()">

            <div class="navbar navbar-fixed">
                <div class="logo">
                    <a href="<?php echo URL?>">
                        <p><span>T</span>ech</p>
                    </a>
                </div>

                <a href="<?php echo URL; ?>">
                    <form class="logout" name="logout" action="<?php echo URL; ?>logout/log_out" method="POST">
                        <button type='submit' name="submit-logout"
                            style="background: transparent; border: none; outline: none">
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
            
            <input type="checkbox" id="check">
            <label for="check">
                <i class="fa fa-bars" id="sidebar-btn"></i>
                <i class="fa fa-times" id="sidebar-cancel"></i>
            </label>
            <div class="sidebar">
                <a href="<?php echo URL; ?>admin"> <span>CONTROL</span> </a>
                <a href="<?php echo URL; ?>users/profile/<?php echo $_SESSION['user']->id;?>"><span>PROFILE</span></a>
                <a href="<?php echo URL; ?>admin/users"><span>USERS</span></a>
                <a href="<?php echo URL; ?>admin/sessions"><span>SESSIONS</span></a>
                
        </nav>
    </header>