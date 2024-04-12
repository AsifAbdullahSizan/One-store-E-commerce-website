<nav class="navbar navbar-transparent bootsnav">
    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <form action="search.php" method="get">
                <div class="input-group">
                    
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" name="keyword" placeholder="Search">
                        <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                    
                </div>
            </form>
        </div>
    </div>
    <!-- End Top Search -->

    <div class="container">            
        <!-- Start Atribute Navigation -->
        <div class="attr-nav">
            <ul>
                <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                <li class="side-menu">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <?php 
                            if (!empty($_SESSION['shopping_cart'])) {

                                echo '('.count($_SESSION['shopping_cart']).')';

                            }else{
                                echo "(0)";
                            }
                        ?>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Atribute Navigation -->

        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.php"><i class="fa fa-bullseye"></i>NE STORE<!-- <img src="images/brand/logo-black.png" class="logo" alt=""> --></a>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                <li><a href="index.php?ref=home">Home</a></li>
                <li><a href="product.php?ref=product">Product</a></li>

                <li><a href="about.php?ref=about">About</a></li>
                <li><a href="contact.php?ref=contact">Contact</a></li>
                <?php  
                    if(isset($_SESSION['id'])){
                        

                ?>

                <li>
                    <a href="dashboard" class="btn btn-default" style="padding: 6px 15px;margin: 22px 10px 0 10px;">
                        <?php  
                            $id = $_SESSION['id'];
                            $query = "SELECT * FROM tbl_users WHERE id = '$id'";
                            $result = mysqli_query($con,$query);

                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)){
                                    echo $row['fullname'];
                                }
                            }          
                                    
                                    
                        ?>
                    </a>
                </li>
                
                <?php  
                    }else{


                ?>

                <li><a href="signin.php" class="btn btn-default" style="padding: 6px 15px;margin: 22px 10px 0 10px;">Sign In</a></li>
                <li><a href="signup.php" class="btn btn-default" style="padding: 6px 15px;margin: 22px 10px 0 10px;">Sign Up</a></li>

                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>   

    <!-- Start Side Menu -->
    <div class="side">
        <a href="#" class="close-side"><i class="fa fa-times"></i></a>
        <div class="widget">
            <table class="table text-center">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>

                <?php 
                    if (!empty($_SESSION['shopping_cart'])) {
                        $total = 0;

                        foreach ($_SESSION['shopping_cart'] as $key => $value) {
                            
                        
                    
                ?>

                <tr>
                    <td><?php echo $value['item_name'] ?></td>
                    <td><?php echo $value['item_price'] ?></td>
                    <td><?php echo $value['quantity'] ?></td>
                    <td><?php echo number_format($value['quantity'] * $value['item_price'], 2) ?></td>

                    <td><a href="?action=delete&id=<?php echo $value['item_id']; ?>" style="color: red;">Delete</a></td>

                    <?php  
                        $total = $total + ($value['quantity'] * $value['item_price']);
                    ?>

                    <?php }} ?>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>TOTAL : </td>
                    <td><?php 
                            if (!empty($_SESSION['shopping_cart'])) {
                                echo number_format($total,2);
                            }
                        ?>    
                    </td>
                    <td>TK</td>
                </tr>

                
            </table>

            <a href="checkout.php" class="btn btn-primary pull-right">Check Out</a>
        </div>
    </div>
    <!-- End Side Menu -->
</nav>