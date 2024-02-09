<div class="main-body" style="min-height: calc(100vh - 300px);">
    <div class="real-body">
        <div class="usertable-container">
            <table id="usertable" class="table table-striped table-bordered" style="width: 100%">
                <thead>
                    <tr style="background-color: #cc6e6e;">
                        <th>Subject</th>
                        <th>Teacher</th>
                        <th>Details</th>
                        <th>availability</th>
                        <?php if (!isset($_SESSION['user']) || $_SESSION['user']->role != "teacher") { ?>
                        <th>Take Place</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $course = $courseModel->getAllCourses();
                    foreach ($course as $tmp){
                        $availability = $availabilityModel->getTeacherAvailability($tmp->teacher_user_id);
                        if (count($availability)!= null) {
                    ?>
                    <tr>
                        <td><?php echo $tmp->name; ?></td>
                        <td><?php echo $tmp->first_name . " " . $tmp->last_name ;?></td>
                        <td>
                        <button class="read_more"><span>read more>></span>
                            <div class="subject-details">
                                <h2><span><?php echo $tmp->name; ?></span></h2>

                                <div class="containerr">
                                    <div class="course-description">
                                        <label for="">Description:</label>
                                        <p class="paraG">
                                            <?php echo $tmp->description; ?>
                                        </p>
                                    </div>
                                    <div class="">
                                        <label for="">Teacher:</label>
                                        <span style="color: red;"><?php echo $tmp->first_name . " " . $tmp->last_name; ?></span>
                                    </div>
                                    <div class="course-catigory">
                                        <label for="">Category:</label>
                                        <span style="color: red;"><?php echo $tmp->classification; ?></span>
                                    </div>
                                    <div class="course-classification">
                                        <label for="">Classification:</label>
                                        <span style="color: red;"><?php echo $tmp->category; ?></span>
                                    </div>
                                    <div class="course-brochure">
                                        <img src="img/art-course.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </button>
                        </td>
                        <form action="<?php echo URL; ?>session/requestSession" method="POST">
                            <input type="hidden" name="subject-id" value="<?php echo $tmp->sub_id;?>">
                            <td>
                                <select name="te-ava-id" id="">
                                    <?php
                                    foreach ($availability as $av){
                                    ?>
                                    <option value="<?php echo $av->t_ava_id; ?>">
                                        <?php echo ($av->from/60 < 10 ? "0": "") . $av->from/60 . ":00 TO "
                                        .($av->to/60 < 10 ? "0": "") . $av->to/60 . ":00  , IN  "
                                        .($av->date);
                                        ?>
                                    </option>
                                    <?php
                                    } 
                                    ?>
                                </select>
                            </td>
                            <?php if (!isset($_SESSION['user']) || $_SESSION['user']->role != "teacher") { ?>
                            <td><button type="submit" name="submit-session-req"><i class="fa fa-plus-circle"
                                        style="color: #ff7373;"></i></button></td>
                            <?php
                                } 
                            }
                            ?>
                        </form>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>