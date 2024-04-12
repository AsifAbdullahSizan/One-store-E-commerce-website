<?php include 'template/head.php'; ?>

<body>

<div class="wrapper">

    <?php include 'template/sidebar.php'; ?>

    <div class="main-panel">
        <?php include 'template/topnav.php'; ?>


        <div class="content">
            <div class="container-fluid">
                <h3>ORDER</h3>
                <?php  
                    if ($role == 1) {
                        
                    
                ?>
                
                <table class="table text-center">
                    <thead>
                      <tr>
                        <th class="text-center">User</th>
                        <th class="text-center">Product</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Token</th>
                        <th class="text-center">Bkash</th>
                        <th class="text-center">Transection ID</th>
                        <th class="text-center">Shipping Address</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php  
                            include 'db/db.php';

                            $query = "SELECT * FROM tbl_order ORDER BY order_id DESC";
                            $result = mysqli_query($con,$query);

                            if ($result) {
                                $i = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    $user_id = $row['user_id'];
                                    $order_id = $row['order_id'];
                                    $product_ids = $row['product_ids'];
                                    $amount = $row['amount'];
                                    $order_status = $row['order_status'];
                                    $date = date("d/m/Y", strtotime($row['date']));
                                    $token_no = $row['token_no'];
                                    $bkash_number = $row['bkash_number'];
                                    $bkash_transection_id = $row['bkash_transection_id'];
                                    $shipping_address = $row['shipping_address'];
                               
                        ?>

                    <tr>
                        <td>
                            <?php  
                                $query_user = "SELECT fullname FROM tbl_users WHERE id = '$user_id'";
                                $result_user = mysqli_query($con, $query_user);
                                $fetch_user = mysqli_fetch_assoc($result_user);
                                echo $fetch_user['fullname'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                $product_ids=explode(",",$product_ids);

                                foreach ($product_ids as $key) {
                                    
                                    $query1 = "SELECT * FROM tbl_products WHERE product_id = '$key'";
                                    $result1 = mysqli_query($con,$query1);
                                    if ($result1) {
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                            echo $product_name = $row1['product_name'].', ';
                                        }
                                    }
                                }
                                
                            ?>
                                
                        </td>
                        <td><?php echo $amount." TK" ?></td>
                        <td><?php echo $token_no ?></td>
                        <td><?php echo $bkash_number ?></td>
                        <td><?php echo $bkash_transection_id ?></td>
                        <td><?php echo $shipping_address ?></td>
                        <td><?php echo $date ?></td>

                        <td>
                            <?php 
                                if ($order_status == 1) {
                                    echo "<a href='order_status_change.php?id=$order_id' class='btn btn-danger' title='Click to Change Status'>Pending</a>";
                                }elseif ($order_status == 2) {
                                    echo "<a href='order_status_change.php?id=$order_id' class='btn btn-success' title='Click to Change Status'>Ready</a>";
                                }else{
                                    echo "<a href='order_status_change.php?id=$order_id' class='btn btn-default' title='Click to Change Status'>Delevered</a>";
                                }

                            ?>
                                    
                        </td>
                    </tr>

                      <?php }} ?>
                    </tbody>
                </table>

                <?php  
                    }else{
                ?>
                <table class="table text-center">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Product</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Token</th>
                        <th class="text-center">Bkash</th>
                        <th class="text-center">Transection ID</th>
                        <th class="text-center">Shipping Address</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php  
                            include 'db/db.php';

                            $query = "SELECT * FROM tbl_order WHERE user_id = '$get_user_id'";
                            $result = mysqli_query($con,$query);

                            if ($result) {
                                $i = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    $product_ids = $row['product_ids'];
                                    $amount = $row['amount'];
                                    $order_status = $row['order_status'];
                                    $date = date("d/m/Y", strtotime($row['date']));
                                    $token_no = $row['token_no'];
                                    $bkash_number = $row['bkash_number'];
                                    $bkash_transection_id = $row['bkash_transection_id'];
                                    $shipping_address = $row['shipping_address'];

                                
                            


                        ?>
                      <tr>
                        <td><?php echo $i++ ?></td>
                        <td>
                            <?php 
                                $product_ids=explode(",",$product_ids);

                                foreach ($product_ids as $key) {
                                    
                                    $query1 = "SELECT * FROM tbl_products WHERE product_id = '$key'";
                                    $result1 = mysqli_query($con,$query1);
                                    if ($result1) {
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                            echo $product_name = $row1['product_name'].', ';
                                        }
                                    }
                                }
                                
                            ?>
                                
                        </td>
                        <td><?php echo $amount." TK" ?></td>
                        <td><?php echo $token_no ?></td>
                        <td><?php echo $bkash_number ?></td>
                        <td><?php echo $bkash_transection_id ?></td>
                        <td><?php echo $shipping_address ?></td>
                        <td><?php echo $date ?></td>

                        <td>
                            <?php 
                                if ($order_status == 1) {
                                    echo "<a href='' class='btn btn-danger' title='Click to Change Status'>Pending</a>";
                                }elseif ($order_status == 2) {
                                    echo "<a href='' class='btn btn-success' title='Click to Change Status'>Ready</a>";
                                }else{
                                    echo "<a href='' class='btn btn-default' title='Click to Change Status'>Delevered</a>";
                                }

                            ?>
                                    
                        </td>
                      </tr>

                      <?php }} ?>
                    </tbody>
                </table>
                <?php } ?>

            </div>
        </div>

        <?php include 'template/footer.php'; ?>

    </div>
</div>

<?php include 'template/foot.php'; ?>