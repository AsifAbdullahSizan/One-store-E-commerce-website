<?php  
    ob_start();
    session_start();
    include 'dashboard/db/db.php';
    include 'dashboard/config/config.php';
?>

<?php  
    if (isset($_GET['ref'])) {
        if ($_GET['ref'] == 'home') {
            $title = "One Store";
        }elseif ($_GET['ref'] == 'product') {
            $title = "All Product";
        }elseif ($_GET['ref'] == 'terms') {
            $title = "Terms & Conditions";
        }elseif ($_GET['ref'] == 'about') {
            $title = "About Me";
        }elseif ($_GET['ref'] == 'contact') {
            $title = "Contact Us";
        }else{
            $title = "One Store";
        }

    }else{
        $title = "One Store";
    }
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
    
    <title><?php echo $title ?></title>

    <!-- CSS -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/bootsnav.css" rel="stylesheet">
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/slick-theme.css" rel="stylesheet">
    <link href="assets/css/slick-custom.css" rel="stylesheet">
    <link href="assets/css/footer.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>