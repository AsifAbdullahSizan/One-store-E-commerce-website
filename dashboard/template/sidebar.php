    <div class="sidebar" data-background-color="white" data-active-color="danger">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.php" class="simple-text">
                    <i class="fa fa-shopping-bag"></i> ONE STORE
                </a>
            </div>
            
            

            <?php  
                if ($role == 1) {
                    
                
            ?>
            <ul class="nav">
                <li class="">
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="product.php">
                        <i class="fa fa-briefcase"></i>
                        <p>Product</p>
                    </a>
                </li>
                <li>
                    <a href="category.php">
                        <i class="fa fa-suitcase"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li>
                    <a href="order.php">
                        <i class="fa fa-first-order"></i>
                        <p>Order</p>
                    </a>
                </li>
                <li>
                    <a href="messages.php">
                        <i class="fa fa-first-order"></i>
                        <p>Massages</p>
                    </a>
                </li>
            </ul>

            <?php }else{ ?>

            <ul class="nav">
                
                <li>
                    <a href="order.php">
                        <i class="fa fa-first-order"></i>
                        <p>Order</p>
                    </a>
                </li>
            </ul>

            <?php } ?>
    	</div>
    </div>