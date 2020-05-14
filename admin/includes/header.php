<!DOCTYPE html>
<html>
<head>
	<title> RGU Vote - <?= $title ?> </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/reset.css">
	<link rel="stylesheet" type="text/css" href="assets/css/app.css">
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="assets/Toast/css/Toast.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fancybox/jquery.fancybox.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/table.css">
	
	<style>
		header{ 
			width: 75% !important; 
			margin: 30px auto 0 auto !important;
		}

		header > img{
			width: 80%;
		}

		.top-header{
			width: 94%;
			height: auto;
			margin: auto;
			padding: 20px 3%;
			border-bottom: 1px solid #E1E1E1;
		}
	</style>
</head>
<body>
	<div class="outerwrapper">
		<div class="sidebar">
			<header> 
				<img src="assets/image/logo.png">
			</header>
			<div class="desktop">
				<div class="sidebar-link"><a href="dashboard.php"><i class="fa fa-home"></i> DASHBOARD </a></div>
				<div class="sidebar-link"><a href="positions.php"><i class="fa fa-eyedropper"></i> POSITIONS </a></div>
				<div class="sidebar-link"><a href="nominees.php"><i class="fa fa-eyedropper"></i> NOMINEES </a></div>	
				<div class="sidebar-link"><a href="votes.php"><i class="fa fa-eyedropper"></i> VOTES </a></div>			
				<div class="sidebar-link"><a href="results.php"><i class="fa fa-eyedropper"></i> RESULTS </a></div>
				<div class="sidebar-link <?= isset($active) ? $active : '' ?>"><a href="profile.php"><i class="fa fa-eyedropper"></i> PROFILE </a></div>
				<div class="sidebar-link"><a href="logout.php" title="Logout"><i class="fa fa-sign-out"></i> LOGOUT </a></div>						
			</div>
		</div>