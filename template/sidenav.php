                <div class="col-md-3">
                    <div class="list-group" style="margin-top: 5px; border-color: rgba(203,54,54,.16);">

                        <h3 class="list-group-item text-center" style="border-color: rgba(203,54,54,.16); background-color: #c33333; color: #fff;">CATEGORIES</h3>

                        <?php  
                            include 'dashboard/db/db.php';

                            $query = "SELECT * FROM tbl_category ORDER BY cat_id ASC";
                            $result = mysqli_query($con,$query);

                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)){
                                    $cat_id = $row['cat_id'];
                                    $cat_name = $row['cat_name'];
                                
                            


                        ?>
                        <a href="category.php?id=<?php echo $cat_id; ?>" class="list-group-item" style="border-color: rgba(203,54,54,.16);"><?php echo $cat_name ?></a>
                        <?php }} ?>
                    </div>
                </div>