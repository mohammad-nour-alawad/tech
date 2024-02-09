<div class="right-side-bar">
    <div class="right-content">
        <div class="tops">
            <div class="bests">
                <span>TOP TEACHERS</span>
            </div>
            <ul style="list-style-type: none;">
                <?php 
              $count=0;
              $teacher = $teacherModel->getTeachers();

              foreach ($teacher as $tmp){
                $count=$count+1;
                if ($count>3)
                  break;
              ?>
                <a href='<?php echo URL; ?>users/profile/<?php echo $tmp->user_id; ?>'>
                    <li>
                        <div class="tops-profile">
                            <img src="<?php echo URL; ?>public/profile-pics/<?php echo $tmp->img_url; ?>" alt="">
                        </div>
                        <span class="top-teacher-name"><?php echo ($tmp->first_name ." ". $tmp->last_name);?></span>
                    </li>
                </a>
                <?php } ?>
            </ul>
        </div>
        <div class="tops">
            <div class="bests">
                <span>TOP USERS</span>
            </div>
            <ul style="list-style-type: none;">
                <?php 
              $count=0;
              $student = $studentModel->getStudents();

              foreach ($student as $tmp){
                $count=$count+1;
                if ($count>3)
                  break;
              ?>
                <a href="<?php echo URL; ?>users/profile/<?php echo $tmp->user_id; ?>">
                    <li>
                        <div class="tops-profile">
                            <img src="<?php echo URL; ?>public/profile-pics/<?php echo $tmp->img_url; ?>" alt="">
                        </div>
                        <span class="top-teacher-name"><?php echo ($tmp->first_name ." ". $tmp->last_name);?></span>
                    </li>
                </a>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>