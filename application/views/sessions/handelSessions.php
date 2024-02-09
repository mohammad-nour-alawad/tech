    <div class="real-body">

        <div class="approve-container">
            <div class="content">
                <?php
                  $session = $sessionModel->getSessionDetails($_SESSION['user']->subject_id ,$_SESSION['user']->teacher_availablity_id );
                  
                  foreach ($session as $tmp)
                  {
                ?>
                <strong>Notice:</strong>
                <p>by approving this session you will reject all the other sessions that have the same availability
                    time.</p>
                <label for="">Course name:</label> <?php echo $tmp->name; ?>
                <br>
                <label for="">availbility time:</label>
                <?php echo ($tmp->from/60 < 10 ? "0": "") . $tmp->from/60 . ":00 TO "
                                                .($tmp->to/60 < 10 ? "0": "") . $tmp->to/60 . ":00  , IN  "
                                                .($tmp->date);
                ?>
                <br>
                <label for="">Student count: </label><?php echo $tmp->student_count; ?>
                <br>
                <br>
                <form method="POST" action="<?php echo URL; ?>session/approveSession">
                    <input type="hidden" name="sub-id" value="<?php echo $_SESSION['user']->subject_id; ?>">
                    <input type="hidden" name="teacher-ava-id"
                        value="<?php echo $_SESSION['user']->teacher_availablity_id; ?>">
                    <label id="title-label">please add sessions title </label><br>
                    <textarea name="title" id="" rows="2"></textarea><br>
                    <label id="reject-reason-label">please add reject reason for the other sessions requests</label>
                    <textarea name="reject-reason" id="" rows="2"></textarea><br>
                    <input type="submit" id="approve" value="proceed approval" name="submit-approve"></input>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>