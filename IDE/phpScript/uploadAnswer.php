<?php
include ('startSession.php');
include ('connection.php');
$id = $_SESSION['id'];
$ida = $_SESSION['ida'];
$idcourse = $_SESSION['id_course'];
$sqlGetCourseCode = "SELECT DISTINCT code, course FROM courses WHERE $idcourse = courses.ID_C;";
$resultCourseCode = $mysqli->query($sqlGetCourseCode);
$rowCourseCode = $resultCourseCode->fetch_assoc();
$courseCode = $rowCourseCode["code"];
$courseTitle = $rowCourseCode["course"];
$path="/upload/assignments/$courseCode/answer/";

//Setting untuk upload file
$extension_list = array('png','jpg', 'pdf', 'docx', 'zip');
$attachment = $_FILES['attachment']['name'];
$x = explode('.', $attachment);
$extension = strtolower(end($x));
$size = $_FILES['attachment']['size'];
$file_tmp = $_FILES['attachment']['tmp_name'];




if (file_exists($path)) {

move_uploaded_file($_FILES["file"]["tmp_name"], "/upload/assignments/$courseCode/answer/" . $attachment);

	$sqlInputActivity = "INSERT INTO submissions (`ID_A`, `ID_U`, `fileDirectory`) VALUES ('$ida','$id', '$path')";
	$mysqli->query($sqlInputActivity);
}else{
	mkdir("/upload/assignments/$courseCode/answer/", 0777, true);
move_uploaded_file($_FILES["file"]["tmp_name"], "/upload/assignments/$courseCode/answer/" . $attachment);

$sqlInputActivity = "INSERT INTO submissions (`ID_A`, `ID_U`, `fileDirectory`) VALUES ('$ida','$id', '$path')";
	$mysqli->query($sqlInputActivity);
}




?>

