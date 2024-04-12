<?php include 'template/head.php'; ?>

<?php include 'template/admin.php'; ?>

<body>

<div class="wrapper">

    <?php include 'template/sidebar.php'; ?>

    <div class="main-panel">
        <?php include 'template/topnav.php'; ?>


        <div class="content">
            <a href="product_add.php" class="btn btn-default" style="float: right;">Add New Product</a>
            <div class="container-fluid">
                <h3>All PRODUCTS</h3>
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Name</th> 
                        <th>Price</th> 
                        <th>Category</th> 
                        <th>Details</th> 
                        <th>Featured</th> 
                        <th>Image</th>  
                        <th>Edit</th>   
                        <th>Delete</th> 
                    </tr>

                    <?php  
                        include 'db/db.php';

                        $query = "SELECT * FROM tbl_products ORDER BY product_id ASC";
                        $result = mysqli_query($con,$query);

                        if ($result) {
                            $i = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                $i++;
                                $product_id         = $row['product_id'];
                                $product_name       = $row['product_name'];
                                $product_price      = $row['product_price'];
                                $product_details    = $row['product_details'];
                                $product_image      = $row['product_image'];

                                $product_featured   = $row['product_featured'];
                                $product_cat_id     = $row['product_cat_id'];
                            
                        


                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $product_name ?></td>
                        <td><?php echo $product_price ?></td>

                        <?php 

                            $query2 = "SELECT tbl_category.cat_name AS cat FROM tbl_category INNER JOIN tbl_products ON tbl_category.cat_id = '$product_cat_id' ";
                            $result2 = mysqli_query($con,$query2);
                            while($row2 = mysqli_fetch_assoc($result2)){
                                $cat_name = $row2['cat'];
                            }

                            if (isset($cat_name)) {
                                echo "<td>$cat_name</th>";
                            }else{
                                echo "<td>No Category Set</th>";
                            }
                         ?>

                        <td><?php echo substr($product_details, 0, 20) ?></td>
                        <td><a href="featured.php?id=<?php echo $product_id ?>&status=<?php echo $product_featured; ?>">
                            <?php  
                                if ($product_featured == 0) {
                                    echo "Make This Featured";
                                }elseif ($product_featured == 1) {
                                    echo "Featured";
                                }
                            ?>
                        </a></td>
                        <td><a href="uploads/<?php echo $product_image ?>" target="_blank">Click To View</a></td>

                        <td><a href="product_edit.php?id=<?php echo $product_id; ?>">Edit</a></td>
                        <td><a href="product_delete.php?id=<?php echo $product_id; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                    </tr>    

                    <?php }} ?>     
                </table>

            </div>
        </div>

        <?php include 'template/footer.php'; ?>

    </div>
</div>


</body>

<?php include 'template/foot.php'; ?>
