<?php include 'template/head.php'; ?>

<body>

<div class="wrapper">

    <?php include 'template/sidebar.php'; ?>

    <div class="main-panel">
        <?php include 'template/topnav.php'; ?>


        <div class="content">
            <div class="container-fluid">
                <?php  
                    if ($role == 1) {
                        
                    
                ?>
                <div class="row" style="margin-top: 4vh;">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Users</p>
                                            <?php  
                                                $query = "SELECT COUNT(id) AS user_count FROM tbl_users";
                                                $result = mysqli_query($con, $query);
                                                $fetch = mysqli_fetch_assoc($result);
                                                echo $fetch['user_count'];
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> All time user
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="fa fa-briefcase"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Products</p>
                                            <?php  
                                                $query = "SELECT COUNT(product_id) AS product_count FROM tbl_products";
                                                $result = mysqli_query($con, $query);
                                                $fetch = mysqli_fetch_assoc($result);
                                                echo $fetch['product_count'];
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> From the begining
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="fa fa-money"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Revenue</p>
                                            <?php  
                                                $query = "SELECT SUM(amount) AS amount FROM tbl_order";
                                                $result = mysqli_query($con, $query);
                                                $fetch = mysqli_fetch_assoc($result);
                                                
                                                if (empty($fetch['amount'])) {
                                                    echo "0 Tk";
                                                }else{
                                                    echo '৳ '.$fetch['amount'];
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-timer"></i> All time revenue
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
            </div>
        </div>

        <?php include 'template/footer.php'; ?>

    </div>
</div>


</body>

<?php include 'template/foot.php'; ?>
