    <div class="real-body">
        <div class="usertable-container">
            <table id="usertable" class="table table-striped table-bordered" style="width: 100%">
                <thead>
                    <tr style="background-color: #cc6e6e;">
                        <th>title</th>
                        <th>Students Count</th>
                        <th>Availability</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      $requests = $sessionModel->getSessionRequests($_SESSION['user']->id);
                      foreach($requests as $tmp){
                    ?>
                    <tr>
                        <form action="<?php echo URL; ?>session/approveform" method="POST">
                            <input type="hidden" name="sub-id" value="<?php echo $tmp->subject_id; ?>">
                            <input type="hidden" name="teacher-ava-id" value="<?php echo $tmp->teacher_availability_id; ?>">
                            <td><?php echo $tmp->name; ?></td>
                            <td><?php echo $tmp->student_count . "     " . "students"; ?>
                                <i class="fa fa-info-circle" style="font-size:20px;"></i>
                            </td>
                            <td>
                                <?php
                                echo ($tmp->from/60 < 10 ? "0": "") . $tmp->from/60 . ":00 TO "
                                    .($tmp->to/60 < 10 ? "0": "") . $tmp->to/60 . ":00  , IN  "
                                    .($tmp->date);
                                ?>
                            </td>
                            <td>
                                <?php if ($tmp->is_availability_closed == 0) { ?>
                                <button type="submit" name="approve-this-session"
                                    style="color: #529cd5; background: transparent; border: none;">
                                    <strong>approve &nbsp;</strong>
                                    <i class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size:17; "></i>
                                </button>
                                <?php } else { ?>
                                <strong style="color: green;">CLOSED</strong>
                                <?php } ?>
                            </td>
                        </form>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>