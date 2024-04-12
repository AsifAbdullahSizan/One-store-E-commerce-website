<?php  
    ob_start();
    session_start();
    include 'db/db.php';
    include 'config/config.php';

    if( !isset($_SESSION['id']) ) {
    header("Location: ../signin.php");
    exit;
    }
?>

<?php 
    $get_user_id = $_SESSION['id']; 
    $query = "SELECT * FROM tbl_users WHERE id = '$get_user_id'";
    $result = mysqli_query($con,$query);
    if ($result) {
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['id'];
            $fullname = $row['fullname'];
            $username = $row['username'];
            $role = $row['role'];
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />



    <!--  Fonts and icons     -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>