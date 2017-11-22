<?php
include('startSession.php');
$name = $_POST['name'];
$description = $_POST['description'];
$dateOpen = $_POST['startDate'];
$dateClosed = $_POST['endDate'];
echo $_SESSION['id_acctypes'];

?>