<?php include 'template/head.php'; ?>

<div style="height: 40vh"></div>
<div class="container text-center">
	<div class="row">
		<form action="order_status_change.php?id=<?php echo $_GET['id']; ?>" method="post">
			<div class="col-md-4">
				<button class="btn btn-danger" name="pending">Pending</button>
			</div>
			<div class="col-md-4">
				<button class="btn btn-success" name="ready">Ready</button>
			</div>
			<div class="col-md-4">
				<button class="btn btn-default" name="delevered">Delevered</button>
			</div>
		</form>
	</div>
</div>
	
<?php include 'template/foot.php'; ?>

<?php  
	$get_order_id = $_GET['id'];
	if (isset($_POST['pending'])) {
		$query = "UPDATE tbl_order SET order_status = 1 WHERE order_id = '$get_order_id'";
		$result = mysqli_query($con,$query);

	    if ($result) {
	        echo "<script>alert('Status Updated Successfully')</script>";
	        echo "<script>window.location.href='order.php'</script>";
	    }
	}elseif (isset($_POST['ready'])) {
		$query = "UPDATE tbl_order SET order_status = 2 WHERE order_id = '$get_order_id'";
		$result = mysqli_query($con,$query);

	    if ($result) {
	        echo "<script>alert('Status Updated Successfully')</script>";
	        echo "<script>window.location.href='order.php'</script>";
	    }
	}elseif (isset($_POST['delevered'])) {
		$query = "UPDATE tbl_order SET order_status = 3 WHERE order_id = '$get_order_id'";
		$result = mysqli_query($con,$query);

	    if ($result) {
	        echo "<script>alert('Status Updated Successfully')</script>";
	        echo "<script>window.location.href='order.php'</script>";
	    }
	}

	
      
?>