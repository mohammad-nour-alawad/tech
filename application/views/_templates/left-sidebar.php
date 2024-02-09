<div class="main-body row" style="min-height: calc(100vh - 300px);">

    <?php if($_SESSION['user']->role != "admin") { ?>
    <div class="left-side-bar">
        <div class="left-content">
            <ul>
                <li>
                    <a href="<?php echo URL; ?>users/profile/<?php echo $_SESSION['user']->id;?>">
                        <img src="<?php echo URL; ?>public/profile-pics/default.jpg" alt=""
                            style="width: 30px; margin-top:-7px; border-radius: 50%;">
                        <span>PROFILE</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL;?> ">
                        <img src="<?php echo URL; ?>public/icons/home.png" alt="" style="width: 30px; margin-top:-7px;">
                        <span> HOME </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL; ?>notification">
                        <img src="<?php echo URL; ?>public/icons/notifications.png" alt=""
                            style="width: 30px; margin-top:-7px;">
                        <span> NOTIFICAIONS </span>
                        <div class="counter2">
                            <label for="" class="count2">
                            </label>
                        </div>
                    </a>
                </li>
                <?php if ($_SESSION['user']->role == "teacher") { ?>
                <li class="">
                    <a href="<?php echo URL; ?>session">
                        <img src="<?php echo URL; ?>public/icons/fa_fa-book.jpg" alt=""
                            style="width: 30px; margin-top:-7px;">
                        <span style="font-size: 13px;"> SESSION REQUESTS </span>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo URL; ?>users/addNewCourse">
                        <img src="<?php echo URL; ?>public/icons/add-bookmark.png" alt=""
                            style="width: 30px; margin-top:-7px;">
                        <span> NEW COURSE </span>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo URL; ?>courses/myCourses">
                        <img src="<?php echo URL; ?>public/icons/course.png" alt=""
                            style="width: 30px; margin-top:-7px;">
                        <span> MY COURSES </span>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo URL; ?>availability/newAvailability">
                        <img src="<?php echo URL; ?>public/icons/add-post.png" alt=""
                            style="width: 30px; margin-top:-7px;">
                        <span> NEW AVAILABILITY </span>
                    </a>
                </li>

                <li class="">
                    <a href="<?php echo URL; ?>reviews">
                        <img src="<?php echo URL; ?>public/icons/about.png" alt=""
                            style="width: 30px; margin-top:-7px;">
                        <span> ALL REVIEWS</span>
                    </a>
                </li>

                <?php } else { ?>
                <li class="">
                    <a href="<?php echo URL; ?>courses/profileCourses">
                        <img src="<?php echo URL; ?>public/icons/course.png" alt="">
                        <span> COURSES </span>
                    </a>
                </li>
                <?php } ?>
                <li class="">
                    <a href="<?php echo URL; ?>users/allUsers">
                        <img src="<?php echo URL; ?>public/icons/users.png" alt="">
                        <span> ALL USERS </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <?php } else { ?>
    <div class="left-side-bar">
        <div class="left-content">
            <ul>
                <li>
                    <a href="<?php echo URL;?>admin">
                        <img src="<?php echo URL; ?>public/icons/setting.png" alt=""
                            style="width: 30px; margin-top:-7px;">
                        <span>CONTROL</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL; ?>admin/users">
                        <img src="<?php echo URL; ?>public/profile-pics/default.jpg" alt=""
                            style="width: 30px; margin-top:-7px; border-radius: 50%;">
                        <span>USERS</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL;?>admin/sessions">
                        <img src="<?php echo URL; ?>public/icons/fa_fa-book.jpg" alt=""
                            style="width: 30px; margin-top:-7px;">
                        <span>SESSIONS</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <?php } ?>