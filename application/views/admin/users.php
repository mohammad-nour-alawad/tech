<div class="main-body row" style="min-height: calc(100vh - 300px);">

    <div class="usertable-container admin-user-table">
        <table id="usertable" class="table table-striped table-bordered" style="width: 100%;">
            <thead>
                <tr style="background-color: #cc6e6e;">
                    <th>
                        id
                    </th>
                    <th>
                        role
                    </th>
                    <th>
                        first name
                    </th>
                    <th>
                        last name
                    </th>
                    <th>
                        email
                    </th>
                    <th>
                        password
                    </th>
                    <th>
                        status
                    </th>
                    <th>
                        birth date
                    </th>
                    <th>
                        gender
                    </th>
                    <th>
                        submit
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($users as $user) {
                    if ($user->role !="admin") {
                ?>
                <tr>
                    <form action="<?php echo URL; ?>users/updateUserInfo/<?php echo $user->id; ?>" method="POST">

                        <td>
                            <?php echo $user->id; ?>
                        </td>
                        <td>
                            <select name="role">
                                <?php if ($user->role == "teacher") { ?>
                                <option value="teacher">teacher</option>
                                <option value="student">student</option>
                                <?php } else { ?>
                                <option value="student">student</option>
                                <option value="teacher">teacher</option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="first_name" value='<?php echo $user->first_name; ?>'>
                        </td>
                        <td>
                            <input type="text" name="last_name" value='<?php echo $user->last_name; ?>'>
                        </td>
                        <td>
                            <input type="text" name="email" value='<?php echo $user->email; ?>'>
                        </td>
                        <td>
                            <input type="text" name="password_hash" value='<?php echo $user->password_hash; ?>'>
                        </td>
                        <td>
                            <select name="status" id="">
                                <?php if ($user->is_active == 1) { ?>
                                <option value="1">active</option>
                                <option value="0">inactive</option>
                                <?php } else { ?>
                                <option value="0">inactive</option>
                                <option value="1">active</option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input type="date" name="birthday" value='<?php echo $user->birthday; ?>'>
                        </td>
                        <td>
                            <select name="gender" id="">
                                <?php if ($user->gender == "male") { ?>
                                <option value="male">male</option>
                                <option value="female">female</option>
                                <?php } else { ?>
                                <option value="female">female</option>
                                <option value="male">male</option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input type="submit" name="submit-update-user" value='save'>
                        </td>
                    </form>

                </tr>
                <?php } } ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>