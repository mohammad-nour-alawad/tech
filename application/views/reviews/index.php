    <div class="real-body">
        <div class="usertable-container">
            <table id="usertable" class="table table-striped table-bordered" style="width: 100%">
                <thead>
                    <tr style="background-color: #cc6e6e;">
                        <th>student</th>
                        <th>session</th>
                        <th>rate</th>
                        <th>comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ratingModel = $this ->loadModel("ratingModel");
                        $reviews = $ratingModel -> getAllReviews($_SESSION['user']->id);
                        foreach ($reviews as $tmp){
                    ?>
                    <tr>
                        <td>
                            <img src="<?php echo URL ?>public/profile-pics/<?php echo $tmp->img_url; ?>" 
                                 style="width: 40px; border-radius: 50%;"
                            alt="">
                            &nbsp; <?php echo $tmp->first_name . " " . $tmp->last_name; ?>
                        </td>
                        <td>
                        <?php echo $tmp->topic; ?>
                        </td>
                        <td>
                        <?php echo $tmp->rate; ?>
                        </td>
                        <td>
                        <?php echo $tmp->comment; ?>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>