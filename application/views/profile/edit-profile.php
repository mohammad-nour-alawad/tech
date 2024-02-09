<div class="real-body">
    <div class="edit-profile-container">
        <div class="profile-container">
            <img src="<?php echo URL; ?>public/profile-pics/<?php echo $_SESSION['user']->img_url; ?>" id="profile-pic">
            <form method="POST" action="<?php echo URL; ?>users/updateProfile">
                <div class="profile-chooser">
                    <input type="file" id="file-reader" value="<?php echo $_SESSION['user']->img_url; ?>"
                        name="img_url">
                    <i class=" fa fa-camera" style="padding-left:1px;"></i>
                </div>
                <div class="profile-data">
                    <label for="">Fisrt Name</label>
                    <input type="text" name="first_name" value="<?php echo $_SESSION['user']->first_name; ?>" id="">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" value="<?php echo $_SESSION['user']->last_name; ?>" id="">
                    <label for="">BIO</label>
                    <input type="text" name="bio" value="<?php echo $_SESSION['user']->bio; ?>" id="">
                    <label for="">Mobile Number</label>
                    <input type="text" name="mobile_number" value="<?php echo $_SESSION['user']->mobile_number; ?>"
                        id="">
                    <label for="">Birthday</label>
                    <input type="date" name="birthday" value="<?php echo $_SESSION['user']->birthday; ?>">
                    <label for="">Gender</label>
                    <select name="gender" id="" value="<?php echo $_SESSION['user']->gender; ?>">
                        <option value="male" <?php echo $_SESSION['user']->gender == 'male' ?  "selected" : ""?>>male
                        </option>
                        <option value="female" <?php echo $_SESSION['user']->gender == 'female' ? "selected" : ""?>>
                            female</option>
                    </select>
                    <label for="">Facebook URL</label>
                    <input type="text" name="facebook_url" value="<?php echo $_SESSION['user']->facebook_url; ?>" id="">
                    <input herf="" type="submit" name="submit-edit" value="Save Changes">
                </div>
            </form>
        </div>
    </div>
</div>