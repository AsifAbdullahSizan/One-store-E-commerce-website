<?php 

	include_once('dashboard/db/db.php');

	if (isset($_POST['signup'])) {
		$myfullname = mysqli_real_escape_string($con,$_POST['fullname']);
		$myusername = mysqli_real_escape_string($con,$_POST['username']);
		$myemail	= mysqli_real_escape_string($con,$_POST['email']); 
		$mypassword1 = mysqli_real_escape_string($con,$_POST['password1']); 
		$mypassword2 = mysqli_real_escape_string($con,$_POST['password2']); 

		if ($mypassword1 === $mypassword2) {
			$mypassword = $mypassword2;

			$sqlcheck = "SELECT id FROM tbl_users WHERE email = '$myemail'";
			$checkuser = mysqli_num_rows($con,$sqlcheck);

			if ($checkuser) {
				echo "<script> alert('Email Already Exists.'); </script>";
				echo "<script> window.location.href='signup.php'; </script>";
			}else{
				$sql = "INSERT INTO tbl_users(fullname,username,email,password) VALUES('$myfullname','$myusername','$myemail','$mypassword')";
				$result = mysqli_query($con,$sql);

				if($result) {
					echo "<script> alert('User Successfully Inserted'); </script>";
					echo "<script> window.location.href='signin.php'; </script>";
				}else {
					echo "<script> alert('ERROR: User Not Inserted'); </script>";
				}
			}
		}else{
			echo "<script> alert('ERROR: Password Missmatch!!!'); </script>";
		}
	}

?>

