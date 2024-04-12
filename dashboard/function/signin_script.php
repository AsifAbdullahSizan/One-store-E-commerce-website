<?php 
	
	include_once('dashboard/db/db.php');

	if (isset($_POST['login'])) {
		$myusername = mysqli_real_escape_string($con,$_POST['username']);
		$mypassword = mysqli_real_escape_string($con,$_POST['password']); 

		$sql = "SELECT id FROM tbl_users WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
		$count = mysqli_num_rows($result);

		if($count == 1) {
			$_SESSION['id'] = $row['id'];
			header("Location: dashboard");
		}else {
			echo "<script> alert('Your Login Name or Password is invalid'); </script>";
		}
	}

?>

