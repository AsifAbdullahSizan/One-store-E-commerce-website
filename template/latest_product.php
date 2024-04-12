            <section class="section">
              <div class="container">
                <h3 class="text-center" style="margin-bottom: 7vh;">LATEST PRODUCTS</h3>

                <div class='row'>

                  <?php  

                    require("dashboard/db/db.php"); 
                    $query = "SELECT * FROM tbl_products ORDER BY product_id ASC LIMIT 4";
                    $result = mysqli_query($con,$query);

                    if ($result) {
                        while($row = mysqli_fetch_assoc($result)){
                            $product_id         = $row['product_id'];
                            $product_name       = $row['product_name'];
                            $product_price      = $row['product_price'];
                            $product_details    = $row['product_details'];
                            $product_image      = $row['product_image'];

                            $product_cat_id     = $row['product_cat_id'];
              
                  ?>
                    
                    <div class="col-lg-3 col-sm-6">
                      <div class='product--red'>
                        <div class='product_inner' style="height: 400px;">
                          <img src="dashboard/uploads/<?php echo $product_image ?>" width='360'>
                          <p style="font-size: 20px;margin-top: 15px; text-align: center; height: 50px;">
                            <?php echo substr($product_name, 0,25); ?></p>
                          <p><?php echo "৳ ".$product_price ?></p>
                          <a href="details.php?id=<?php echo $product_id; ?>">View Details</a>
                        </div>
                      </div>
                    </div>

                  <?php }} ?>

                </div>
                
                <div class="text-center" style="margin-top: 5vh; ">
                    <a href="product.php" class="btn btn-danger btn-lg" style="font-size: 12px !important; padding: 14px 40px;">VIEW ALL PRODUCT</a>
                </div>
              </div>
                
            </section>