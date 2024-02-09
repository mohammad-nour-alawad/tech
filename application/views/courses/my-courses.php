    <div class="real-body">
        <div class="usertable-container">
            <table id="usertable" class="table table-striped table-bordered" style="width: 100%">
                <thead>
                    <tr style="background-color: #cc6e6e;">
                        <th>Subject</th>
                        <th>Category</th>
                        <th>Classification</th>
                        <!-- <th>edit</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                $courses = $courseModel -> getTeacherCourses($_SESSION['user']->id);
                foreach ($courses as $tmp){
              ?>
                    <tr>
                        <td><?php echo $tmp->name; ?></td>
                        <td><?php echo $tmp->category; ?></td>
                        <td><?php echo $tmp->classification; ?></td>
                        <!-- <td><i class="fa fa-edit"></i></td> -->
                    </tr>

                    <?php } ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>