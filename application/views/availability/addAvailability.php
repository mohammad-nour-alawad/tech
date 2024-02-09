<div class="real-body">
    <div class="availability-container">
        <div class="content">
            <h1>
                <a href="#home">
                    <p style="font-size: 30px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
                        <span style="color: red;">T</span>ech
                    </p>
                </a>
            </h1>
            <form action="<?php echo URL; ?>availability/addAvailability" method="POST" style="display: inline;">
                FROM
                <select name="from" id="" style="margin-top: 20px;">
                    <?php 
                for ($i = 0; $i<24 ; $i++){
              ?>
                    <option value="<?php echo $i*60; ?>"> <?php echo $i .":00";?> </option>
                    <?php } ?>
                </select>
                <br>
                TO
                <select name="to" id="" style="margin-left: 40px;">
                    <?php 
                for ($i = 0; $i<24 ; $i++){
              ?>
                    <option value="<?php echo $i*60; ?>"> <?php echo $i .":00";?> </option>
                    <?php } ?>
                </select>
                <br>
                IN
                <input type="date" name="date">
                <input type="submit" name="submit-availability"></button>
            </form>

        </div>
    </div>
</div>