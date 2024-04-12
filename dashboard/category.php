<?php include 'template/head.php'; ?>

<?php include 'template/admin.php'; ?>

<body>

<div class="wrapper">

    <?php include 'template/sidebar.php'; ?>

    <div class="main-panel">
        <?php include 'template/topnav.php'; ?>


        <div class="content">
            <div class="container-fluid">
                <h3>CATEGORY</h3>
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">ADD NEW CATEGORY</h4>
                            </div>
                            <div class="content">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="cat_name">CATEGORY NAME</label>
                                                <input type="text" class="form-control border-input" placeholder="Category Name" id="cat_name" name="cat_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd pull-right" name="add_category">ADD CATEGORY</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">CATEGORY LIST</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>   
                                        <th>Edit</th>   
                                        <th>Delete</th> 
                                    </tr>

                                    <?php  
                                        include 'db/db.php';

                                        $query = "SELECT * FROM tbl_category ORDER BY cat_id ASC";
                                        $result = mysqli_query($con,$query);

                                        if ($result) {
                                            while($row = mysqli_fetch_assoc($result)){
                                                $id = $row['cat_id'];
                                                $name = $row['cat_name'];
                                            
                                        


                                    ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><a href="cat_edit.php?id=<?php echo $id; ?>">Edit</a></td>
                                        <td><a href="cat_delete.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                                    </tr>    

                                    <?php }} ?>     
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'template/footer.php'; ?>

    </div>
</div>


</body>

<?php include 'template/foot.php'; ?>



<?php
                                    
    if(isset($_POST["add_category"])) {
        include 'db/db.php';
        $cat_name = mysqli_real_escape_string($con, $_POST['cat_name']);

        if (!empty($cat_name)) {
            $query = "INSERT INTO tbl_category(cat_name) VALUES('$cat_name')";
            $result = mysqli_query($con,$query);
            if ($result) {
                echo "<script>alert('Category Inserted Successfully')</script>";
                echo "<script>window.location.href='category.php'</script>";
            }else{
                echo "<script>alert('ERROR!!! While inserting Category')</script>";
            }

        }else{
            echo "<script>alert('Field Must Not be Empty')</script>";
        }

                


    }
    
?>