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
			<button class=" w3-button w3-theme-l5 w3-large w3-border w3-margin-left w3-right">About us</button>
			<button class=" w3-button w3-theme-l5 w3-large w3-border w3-right w3-margin-left">Contact us</button>
			<button class=" w3-button w3-theme-l5 w3-large w3-border w3-right">Help</button>
		</div>

		<div style="height:400px; width:100%;margin-top:280px;" class="w3-container w3-text-white w3-left">
			<h1 class="w3-jumbo">IDE</h1>
			<p>Interactive Digital Learning Environment</p>
			<p>Faculty of Information Technology and Science-</p>
			<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-theme-l5 w3-large">Login</button>
		</div>
		<div class="w3-text-white">
		<p>&copy Developed by Maria Veronica Claudia Muljana, S.T.</p>
		</div>

		<div class="w3-container">
  <h2>W3.CSS Login Modal</h2>
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">Login</button>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      <h1>Login</h1>
      </div>

      <form class="w3-container" action="/action_page.php">
        <div class="w3-section">
          <input class="w3-input w3-border-bottom w3-margin-bottom" type="text" placeholder="Enter Username" name="usrname" required>
          <input class="w3-input w3-border-bottom" type="password" placeholder="Enter Password" name="psw" required>
          <button class="w3-button w3-block w3-black w3-section w3-padding" type="submit">Login</button>
          
        </div>
      </form>

      <div class="w3-container  w3-padding-16 ">
      <p>
        <span class="w3-left w3-padding w3-hide-small"> <a href="#">Forgot password</a></span><p>or</p> <span class="w3-left w3-padding w3-hide-small"> <a href="#">Forgot username?</a></span>
        </p>
      </div>

    </div>
  </div>
</div>

	</body>
</html>