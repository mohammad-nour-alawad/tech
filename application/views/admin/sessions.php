<div class="main-body row" style="min-height: calc(100vh - 300px);">

    <div class="usertable-container admin-user-table" style="width: 100%;">
        <table id="usertable" class="table table-striped table-bordered" style="width: 100%;">
            <thead>
                <tr style="background-color: #cc6e6e;">
                    <th>
                        id
                    </th>
                    <th>
                        subject
                    </th>
                    <th>
                        teacher
                    </th>
                    <th>
                        availability
                    </th>
                    <th>
                        # student
                    </th>
                    <th>
                        is_approved
                    </th>
                    <th>
                        Teacher Profile
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($sessions as $session) {
                ?>
                <tr>
                    <td>
                        <?php echo $session->session_id; ?>
                    </td>
                    <td>
                        <?php echo $session->name;?>
                    </td>
                    <td>
                        <?php echo $session->first_name . " " . $session->last_name; ?>
                    </td>
                    <td>
                        <?php echo ($session->from/60 < 10 ? "0": "") . $session->from/60 . ":00 TO "
                                                                .($session->to/60 < 10 ? "0": "") . $session->to/60 . ":00  , IN  "
                                                                .($session->date);
                        ?>
                    </td>
                    <td>
                        <?php echo $session->student_count; ?>
                    </td>
                    <td>
                        <?php if ($session->status == 1) { ?>
                        <strong style="color: green;">APPROVED</strong>
                        <?php } else if (($session->status == -1)) { ?>
                        <strong style="color: RED;">REJECTED</strong>
                        <?php } else { ?>
                        <form action="<?php echo URL; ?>session/approveform" method="POST">

                            <input type="hidden" name="sub-id" value="<?php echo $session->subject_id; ?>">
                            <input type="hidden" name="teacher-ava-id"
                                value="<?php echo $session->teacher_availability_id; ?>">

                            <button type="submit" name="approve-this-session"
                                style="color: #529cd5;
                                                                                 background: transparent; border: none;">
                                <strong>approve &nbsp;</strong>
                                <i class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size:17; "></i>
                            </button>
                        </form>

                        <?php } ?>
                    </td>
                    <td>
                        <a href="<?php echo URL; ?>users/profile/<?php echo $session->teacher_user_id; ?>">
                            <?php echo $session->first_name . "'s Profile" ; ?>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>