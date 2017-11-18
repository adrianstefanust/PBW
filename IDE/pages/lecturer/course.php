<?php
include('../../phpScript/connection.php'); 
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
		<div class="w3-container" style="width: 75%; float: right;">
			<div class="w3-panel w3-card-2 w3-grey"><p><?php
			echo $_GET["courseTitle"];
			?></p></div>
			<?php include("../../phpScript/topics.php");?>
		</div>
	</div>
	<!--MODAL-->
	<div id="id01" class="w3-modal">
		<div class="w3-modal-content">
			<header class="w3-container">
				<span onclick="document.getElementById('id01').style.display='none'" 
				class="w3-button w3-display-topright">&times;</span>
				<p>SELECT ACTIVITY</p>
				<hr>
			</header>
			<div class="w3-container">
				<input type="radio" name="" value="Assignment"> Assignment
				<br>
				<input type="radio" name="" value="File"> File
			</div>
			<footer class="w3-container">
				<button type="submit">ADD</button>
			</footer>
		</div>

	</div>
</body>
</html>
<script type="text/javascript">
	var button = document.getElementById("button-modal");
	button.onclick = function(){
		document.getElementById('id01').style.display='block';
	}
</script>

