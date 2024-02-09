<div class="real-body">
    <div class="profile-container">
        <img src="<?php echo URL; ?>public/profile-pics/<?php echo $user_img_url; ?>" class="avatar">
        <div class="name-profile">
            <span class="username">
                <?php 
              echo $user_first_name . " " . $user_last_name;
            ?>
            </span> <br>
            <span class="speciality">
                <?php
              echo $user_bio;
            ?>
            </span>
        </div>
        <?php if ($_SESSION['user']->id == $user_id) { ?>
        <a href="<?php echo URL; ?>users/editProfile">
            <input class="edit" type="button" value="Edit Profile">
        </a>
        <?php } ?>
        <div class="content">
            <img src="<?php echo URL; ?>public/icons/user-mobile-number.png" alt="">
            <span>+
                <?php 
              echo $user_mobile_number;
            ?>
            </span>
            <img src="<?php echo URL; ?>public/icons/user-phone.png" alt="" style="margin-left:80px;">
            <span>+
                <?php 
              echo $user_mobile_number;
            ?>
            </span>
            <br>
            <br>
            <img src="<?php echo URL; ?>public/icons/user-birthday.png" alt="">
            <span>
                <?php
              echo $user_birthday;
            ?>
            </span>
            <img src="<?php echo URL; ?>public/icons/user-fb.png" alt="" style="margin-left:110px;">
            <a href="<?php echo $user_facebook_url; ?>">
                <span>
                    <?php 
                echo $user_first_name . " " . $user_last_name;
              ?>
                </span>
            </a>
            <br>
            <br>
            <img src="<?php echo URL; ?>public/icons/user-address.png" alt=""><span> Tech Incorprate</span><br> <br>

            <?php if ($user_role == "teacher") { ?>
            <div class="teacher-rate">
                <h4>
                    Rate &nbsp;&nbsp;
                    <span id="overall-rate">
                        <?php
                $rates = $teacherModel->getTeacherRates($user_id);
                $sum = 0;
                foreach($rates as $tmp){
                  $sum += $tmp->rate;
                }
                echo (count($rates)!=0 ? round($sum/count($rates),2)."/5" : 0);
              ?>
                        <?php?>
                    </span>
                </h4>
                <p>
                    reviewed by
                    <span id="overall-review-number">
                        <?php
                  $rates = $teacherModel->getTeacherRates($user_id);
                  echo count($rates);
                ?>
                    </span>
                    students
                </p>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="usertable-container availability-table">
        <h2 style="text-align: center; padding-bottom: 20px;">
            <?php if ($user_role == "teacher") { ?>
            <span style="border-bottom: 1px solid #ff7373;">availabilities</span>
            <?php } else { ?>
            <span style="border-bottom: 1px solid #ff7373;">
                <?php echo $user_first_name; ?> sessions
            </span>
            <?php } ?>
        </h2>
        <?php if ($user_role == "teacher") { ?>
        <table id="usertable" class="table table-striped table-bordered">
            <thead>
                <tr style="background-color: #cc6e6e;">
                    <th>from</th>
                    <th>to</th>
                    <th>date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
              $availability = $availabilityModel->getTeacherAvailability($user_id);
              foreach ($availability as $tmp){
            ?>
                <tr>
                    <td> <?php echo ($tmp->from)/60 . ":00";?></td>
                    <td> <?php echo ($tmp->to)/60 . ":00";?></td>
                    <td><?php echo ($tmp->date);?></td>
                    <td><?php echo ((($tmp->is_availability_closed==1 || $tmp->date<date("Y-m-d") ||
                                    ($tmp->date==date("Y-m-d") && $tmp->from<(date("H")+2)*60+date("i")))) ? "CLOSED" : "OPEN"); ?></td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
        <?php } else { ?>
        <table id="usertable" class="table table-striped table-bordered">
            <thead>
                <tr style="background-color: #cc6e6e;">
                    <th>course</th>
                    <th>session title</th>
                    <th>teacher</th>
                    <th>Availability</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <?php          
                    $sessions = $sessionModel->getStudentSessions($user_id);
                    foreach ($sessions as $tmp2) {
                ?>
                <tr>
                    <td><?php echo $tmp2->subject_name; ?></td>
                    <td><?php echo $tmp2->session_topic; ?></td>
                    <td><?php echo $tmp2->teacher_first_name . " " . $tmp2->teacher_last_name; ?></td>
                    <td>
                        <?php
                        echo ($tmp2->from/60 < 10 ? "0": "") . $tmp2->from/60 . ":00 TO "
                            .($tmp2->to/60 < 10 ? "0": "") . $tmp2->to/60 . ":00  , IN  "
                            .($tmp2->date);
                        ?>
                    </td>
                    <td>
                        <?php
                            $time = (date("H")+2)*60+date("i");
                            if ($tmp2->is_approved == "0" && $tmp2->from<$time) { 
                        ?>
                        <strong style="color: gray;">PENDING</strong>

                        <?php } else if ($tmp2->is_approved == -1 || ($tmp2->to< (date("H")+2)*60+date("i") && $tmp2->is_approved == "0")) { ?>
                        <button class="reject-btn">
                            <strong style="color: red;">REJECTED</strong>
                            <?php if ($_SESSION['user']->id == $user_id) { ?>
                            <div class="popup-reason">
                                <p>
                                    <?php echo $tmp2->reject_reason; ?>
                                </p>
                            </div>
                            <?php } ?>
                        </button>

                        <?php } else { ?>
                        <?php
                         $time = (date("H")+2)*60+date("i");
                         if (date("Y-m-d") > $tmp2->date && $_SESSION['user']->id == $user_id || ( $tmp2->to<=$time && date("Y-m-d") ==  $tmp2->date) )
                            {
                        ?>
                        <?php if ($tmp2->rate != 0) { ?>
                            Rated <?php echo $tmp2->rate; ?> by you.
                        <?php }?>
                        <button class="rate-me-up">
                            <?php if ($tmp2->rate == 0) { ?>
                                Rate this session
                            <?php } else { ?>
                                edit!
                            <?php } ?>
                        </button>
                        <div class="rating-container">
                            <button class="content">
                                <form action="<?php echo URL; ?>rate/rateSession" method="POST">
                                    <input type="hidden" name="session_id" value="<?php echo $tmp2->session_id;?>">
                                    <input type="hidden" name="te_ava_id" value="<?php echo $tmp2->teacher_availability_id;?>">
                                    <input type="hidden" name="subject_id" value="<?php echo $tmp2->subject_id;?>">

                                    <div class="star-widget" style="display: block !important;">
                                        <input type="radio" name="rate" value="5"
                                            id="rate-5<?php echo $tmp2->session_id; ?>" class="rate-5">
                                        <label for="rate-5<?php echo $tmp2->session_id; ?>" class="fa fa-star"></label>

                                        <input type="radio" name="rate" value="4"
                                            id="rate-4<?php echo $tmp2->session_id; ?>" class="rate-4">
                                        <label for="rate-4<?php echo $tmp2->session_id; ?>" class="fa fa-star"></label>

                                        <input type="radio" name="rate" value="3"
                                            id="rate-3<?php echo $tmp2->session_id; ?>" class="rate-3">
                                        <label for="rate-3<?php echo $tmp2->session_id; ?>" class="fa fa-star"></label>

                                        <input type="radio" name="rate" value="2"
                                            id="rate-2<?php echo $tmp2->session_id; ?>" class="rate-2">
                                        <label for="rate-2<?php echo $tmp2->session_id; ?>" class="fa fa-star"></label>

                                        <input type="radio" name="rate" value="1"
                                            id="rate-1<?php echo $tmp2->session_id; ?>" class="rate-1">
                                        <label for="rate-1<?php echo $tmp2->session_id; ?>" class="fa fa-star"></label>
                                        <div class="form-rating">
                                            <header></header>
                                            <textarea placeholder="add comment.." name="comment"></textarea>
                                            <input type="submit" name="submit-rate" class="submit-rate" value="submit">
                                        </div>
                                    </div>
                                </form>
                            </button>
                        </div>
                        <?php } else { ?>
                        <strong style="color: green">APPROVED</strong>
                        <?php } ?>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
            <tfoot>
            </tfoot>
        </table>

        <?php } ?>


    </div>
</div>