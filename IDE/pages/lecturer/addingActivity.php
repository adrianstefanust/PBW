<!-- include connection -->
<?php include('../../phpScript/connection.php'); 
include('../../phpScript/startSession.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>IDE</title>
	<!-- include style -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../lib/w3.css">
	<link rel="stylesheet" href="../../lib/font-awesome.css">
	<link rel="stylesheet" href="../../style/style.css">
	<link rel="stylesheet" href="../../lib/w3-theme-dark-grey.css">
</head>

<body>
	<?php $myCourses = false ?>
	<!-- include header -->
	<?php include ('../../layout/header.php');?>
	<div class="w3-main">
		<!-- include sidebar -->
		<?php include ('../../layout/sidebar.php');?>
		<div class="w3-container w3-padding-left w3-padding-right" style="width: 75%; float:right; padding:0px; height:630px;">
			<div class="w3-theme-l2 " style="margin:0px;padding:0px;">
			<h1 class="w3-margin-left w3-text-black " >Adding a new files</h1>
			</div>
			<button type="submit" class="w3-large w3-black w3-btn w3-right">Collapse All</button>
		</div>
	</div>
	
</body>
</html>
