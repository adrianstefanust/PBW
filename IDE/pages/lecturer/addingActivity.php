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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
	<?php $myCourses = false ?>
	<!-- include header -->
	<?php include ('../../layout/header.php');?>
	<div class="w3-main">
		<!-- include sidebar -->
		<?php include ('../../layout/sidebar.php');
		$acctypes = $_GET['activity'];
		$idtopic = $_GET['id_topik'];

		?>
		<div class="w3-container w3-padding-left w3-padding-right" style="width: 75%; float:right; padding:0px; height:630px;">
			<div class="w3-theme-l2 " style="margin:0px;padding:0px;">
				<?php
				if($acctypes==1){
					echo "<h1 class="."'w3-margin-left w3-text-black'"." >Adding a new Assignments</h1>";
				}
				else{
					echo "<h1 class="."'w3-margin-left w3-text-black'"." >Adding a new File</h1>";
				}
				?>
			</div>
			<button type="submit" class="w3-large w3-black w3-btn w3-right" onclick="CollapseAll()">Collapse All</button><br><br>
			
			<div id="accordions">
				<fieldset>
					<legend>
						<button id="general" class="w3-button w3-black  w3-border-black toggler" onclick="GeneralClicked()">
							General <i id="arrowL" class="fa fa-sort-down"></i>
						</button>
					</legend>
					<div class="w3-hide w3-container w3-margin-top" id="gen">
						<div style="width:100%;height:60px">
							<text class="w3-text-red w3-left " style="margin-left:60px;">Name*</text>
							<input class="w3-input w3-border w3-border-theme value w3-left" type="text" style="width:800px;margin-left:100px;height:30px;" >
						</div>
						<div style="margin-top:10px;padding:0px;height:100px;">
							<text class="w3-left " style="margin-left:60px;">Description</text>
							<textarea class="w3-input w3-border w3-border-theme value w3-left" type="text" style="width:800px;margin-left:70px;height:70px;" ></textarea>	
						</div>
					</div>
				</fieldset>
				<br>
				<?php
				if($acctypes==1){
					?>
					<fieldset>
						<legend>
							<button id="content" class="w3-button w3-black  w3-border-black toggler" onclick="availabilityClicked()">
								Availability <i id="arrowL" class="fa fa-sort-down"></i>
							</button>
						</legend>
						<div class="w3-hide w3-container w3-margin-top" id="avail">
							Allow submissions from <i class="fa fa fa-question-circle"></i> <input type="date" name=""> <input type="checkbox" name=""> Enable
							<br>
							<br>
							Due Date <i class="fa fa fa-question-circle"></i> <input type="date" name=""> <input type="checkbox" name=""> Enable
							<br>
						</div>
					</fieldset>
					<br>
					<?php
				}
				?>
				<fieldset>
					<legend>
						<button id="content" class="w3-button w3-black  w3-border-black toggler" onclick="ContentClicked()">
							Content <i id="arrowL" class="fa fa-sort-down"></i>
						</button>
					</legend>
					<div class="w3-hide w3-container w3-margin-top" id="con">
						<text>Select File <i class="fa fa fa-question-circle"></i></text>
					</div>
				</fieldset>
			</div>
			<div style="margin-top: 35px; margin-left: 30%;">
				<button class="w3-button w3-black  w3-border-black toggler">SAVE AND RETURN TO COURSE</button>
			<button class="w3-button w3-black  w3-border-black toggler">CANCEL</button>
			</div>
		</div>
		<script>
			function GeneralClicked() {

				var x = document.getElementById('gen');
				if (x.className.indexOf("w3-show") == -1) {
					x.className += " w3-show";
				} else { 
					x.className = x.className.replace(" w3-show", "");
				}
				
			}
			function availabilityClicked() {

				var x = document.getElementById('avail');
				if (x.className.indexOf("w3-show") == -1) {
					x.className += " w3-show";
				} else { 
					x.className = x.className.replace(" w3-show", "");
				}
				
			}
			function ContentClicked() {

				var x = document.getElementById('con');
				if (x.className.indexOf("w3-show") == -1) {
					x.className += " w3-show";
				} else { 
					x.className = x.className.replace(" w3-show", "");
				}
				
			}
			function CollapseAll(){
				var x = document.getElementById('con');
				if (x.className.indexOf("w3-hide") == -1) {
					x.className += " w3-hide";
				} else { 
					x.className = x.className.replace(" w3-show", "");
				}
				var x = document.getElementById('gen');
				if (x.className.indexOf("w3-hide") == -1) {
					x.className += " w3-hide";
				} else { 
					x.className = x.className.replace(" w3-show", "");
				}
				var x = document.getElementById('avail');
				if (x.className.indexOf("w3-hide") == -1) {
					x.className += " w3-hide";
				} else { 
					x.className = x.className.replace(" w3-show", "");
				}
			}
		</script>
	</body>
	</html>
