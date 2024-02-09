<div class="real-body">
    <div class="notification-container">
        <div class="content">
            <h1>
                Notifications
            </h1>

            <ul class="notification">
                <?php 
                    $notifications = $notificationModel->getUserNotifications($_SESSION['user']->id);
                    $counter = 0;
                    for ($i=count($notifications)-1;$i>0;$i--) {
                        $single = $notificationModel->getNotificationDetails($notifications[$i]->notification_id);
                        $notificationModel -> setNotificationSeen($notifications[$i]->notification_id);
                        $counter++;
                ?>
                <li>
                    <span class="notification-header"><?php echo $single[0]->header .":"; ?></span>
                    <?php echo $single[0]->f_name . " " .  $single[0]->l_name. " " .  $single[0]->body . " \"" . $single[0]->subject_name . "\" "; ?><br>
                    <span class="notification-send-date"><?php echo $single[0]->send_date; ?></span>
                </li>
                <?php } ?>
                <?php if ($counter == 0) { ?>
                <li> <?php echo "no notifications yet."; ?> </li>
                <?php } ?>
            </ul>

        </div>
    </div>
</div>