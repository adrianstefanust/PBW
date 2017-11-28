<?php
include('connection.php');
include ('startSession.php');
$email=$_POST['email1']; // Fetching Values from URL.
$password= sha1($_POST['password1']); // Password Encryption, If you like you can also leave sha1.
// check if e-mail address syntax is valid or not

// Matching user input email and password with stored email and password in database.
$result = mysql_query("SELECT users.username as username , users.pass as password FROM users WHERE users.username='$email' AND users.pass ='$password'");
$data = mysql_num_rows($result);
if($data==1){
echo "Successfully Logged in...";
}else{
echo "Email or Password is wrong...!!!!";
}

mysql_close ($connection); // Connection Closed.
?>