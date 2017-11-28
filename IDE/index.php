<?php
include ('phpScript/startSession.php');
include('phpScript/connection.php');
$temp = "";
if(isset($_COOKIE["cookieuname"])){
	$temp = $_COOKIE["cookieuname"];
}
?>
<!DOCTYPE html>
<html>
<head>
	<style>
	body  {
		background-image:url("img/bgImg.jpg");
	}
</style>
<title>IDE</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="lib/w3.css">
<link rel="stylesheet" href="lib/font-awesome.css">
<link rel="stylesheet" href="lib/w3-theme-dark-grey.css">

</head>
<body>
	<div style="width:100%;" class="w3-container w3-bar w3-btn-bar">

		<button style="margin-left:3px;" class=" w3-button w3-grey w3-large w3-border  w3-right">About us
		</button>

		<button style="margin-left:3px;" class=" w3-button w3-grey w3-large w3-border w3-right ">Contact us
		</button>

		<button class=" w3-button w3-grey w3-large w3-border w3-right">Help
		</button>

	</div>

	<div style="height:400px; width:100%;margin-top:280px;" class="w3-container w3-text-white w3-left">
		<h1 class="w3-jumbo">IDE</h1>
		<p>Interactive Digital Learning Environment</p>
		<p>Faculty of Information Technology and Science-</p>
		<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-grey w3-large">Login</button>
	</div>


	<div class="w3-text-white">
		<p>&copy Developed by Adrian Stefanus & Hengky Surya</p>
	</div>



	<div class="w3-container">
		<div id="id01" class="w3-modal">
			<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

				<div class="w3-center"><br>
					<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

				</div>

				<form class="w3-container" id="formLogin" method="post" action="phpScript/login.php">
					<h1 class="w3-left">Login</h1>
					<div class="w3-section">
						<input class="w3-input w3-border-bottom w3-margin-bottom" type="text" placeholder="Username" name="username" required value="<?php if(
       isset($_COOKIE['cookieuname']))
       {
           echo $_COOKIE['cookieuname'];
           }
    ?>" id="email">
						<input class="w3-input w3-border-bottom" type="password" placeholder="Password" name="psw" id="password" required>
						<button class="w3-button w3-block w3-black w3-section w3-padding" type="submit" id="submitLogin">Login</button>
						<p id="messageError" style="color : red"></p>
					</div>
				</form>

				<div class="w3-container  w3-padding-16 ">
					<a href="#" style="display:inline-block;">Forgot password</a></span> <text style="display:inline-block;"> or </text>  <a style="display:inline-block;" href="#">Forgot username?</a>
				</div>

			</div>
		</div>
	</div>

</body>
<script>
$(document).ready(function(){
$("#submitLogin").click(function(){

var email = $("#email").val();
var password = $("#password").val();
$.post("login.php",{ email1: email, password1:password},
function(data) {
if(data=='Invalid Email.......') {
$('input[type="text"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
$('input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
alert(data);
}else if(data=='Email or Password is wrong...!!!!'){
$('input[type="text"],input[type="password"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
alert(data);
} else if(data=='Successfully Logged in...'){
$("form")[0].reset();
$('input[type="text"],input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
alert(data);
} else{
alert(data);
}
});
});
});
</script>
</html>