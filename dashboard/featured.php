<?php include 'template/head.php'; ?>


<?php  
	$get_id = $_GET['id'];

	if (isset($_GET['id']) && $_GET['status'] == 0) {
		$query = "UPDATE tbl_products SET product_featured = 1 WHERE product_id = '$get_id'";
		$result = mysqli_query($con,$query);

	    if ($result) {
	        echo "<script>alert('Featured')</script>";
	        echo "<script>window.location.href='product.php'</script>";
	    }
	}elseif (isset($_GET['id']) && $_GET['status'] == 1) {
		$query = "UPDATE tbl_products SET product_featured = 0 WHERE product_id = '$get_id'";
		$result = mysqli_query($con,$query);

	    if ($result) {
	        echo "<script>alert('Removed from Featured')</script>";
	        echo "<script>window.location.href='product.php'</script>";
	    }
	}
  
?>