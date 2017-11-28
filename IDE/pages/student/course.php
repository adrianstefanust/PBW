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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
			$_SESSION["courseTitle"] = $_GET["courseTitle"];
			echo $_SESSION["courseTitle"];

			?></p>

		</div>
		<p id="keterangan-upload"></p>
			<?php include("../../phpScript/topics.php");?>
		</div>
	</div>
</body>
</html>
<!--AJAX-->
<script type="text/javascript">
	$('#upload').on('click', function(e) {
		response = '';
		e.preventDefault();
		var file_data = $('#attachment-file').prop('files')[0];
		var form_data = new FormData($("#formUpload")[0]);                             
		$.ajax({
			type: 'POST',
			url: "../../phpScript/uploadAnswer.php",
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,                         
			async : false,
			success: function(text){
				response = text;
			}
		});
		if(response == "success"){
			document.location.reload();
			
		}
		else{
			 $("#keterangan-upload").text(response);
		}
		$("#formUpload")[0].reset();
		
	});
	
</script>
?>