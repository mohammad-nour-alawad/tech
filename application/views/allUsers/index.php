<div class="main-body" style="min-height: calc(100vh - 300px);">
    <div class="real-body">
        <div class="usertable-container all-users">
            <table id="usertable" class="table table-striped table-bordered" style="width: 100%">
                <thead>
                    <tr style="background-color: #cc6e6e;">
                        <th>id</th>
                        <th>Name</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($users as $tmp){
                        if ($tmp->role != "admin") {
                    ?>
                    <tr>
                        <td class="user-id"><?php echo $tmp->id."."; ?></td>
                            <td style="text-align: left;">
                                <div class="username-container">
                                    <a href="<?php echo URL; ?>users/profile/<?php echo $tmp->id; ?>">
                                        <img src="<?php echo URL; ?>public/profile-pics/<?php echo $tmp->img_url; ?>" alt=""
                                            style="">&nbsp;&nbsp;&nbsp;
                                        <?php echo " ".$tmp->first_name." ".$tmp->last_name; ?>
                                    </a>
                                </div>
                            </td>
                        <td>
                            <?php if ($tmp->role=="student") { ?>
                            <img src="<?php echo URL; ?>public/icons/student.png" alt=""
                                 style="">&nbsp;&nbsp;
                            <?php } else { ?>
                            <img src="<?php echo URL; ?>public/icons/teacher.png" alt=""
                                 style="">&nbsp;&nbsp;
                            <?php } ?>
                            <?php echo $tmp->role; ?>
                        </td>
                    </tr>
                    <?php  }} ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>