<?php
$conn = new mysqli("localhost","root","","ide");
if($conn->connect_errno){
 echo "failed to connect.";
}
?>