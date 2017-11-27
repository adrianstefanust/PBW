<?php
include('connection.php'); 
include('startSession.php');
$idcourse = $_SESSION['id_course'];
$idtopic = $_SESSION['id_topic'];
$acctypes = $_SESSION['id_acctypes'];
$sqlGetCourseCode = "SELECT DISTINCT code FROM courses WHERE $idcourse = courses.ID_C;";
$resultCourseCode = $mysqli->query($sqlGetCourseCode);
$rowCourseCode = $resultCourseCode->fetch_assoc();
$courseCode = $rowCourseCode["code"];




if($acctypes==1){
	$name = $_POST['name'];
	$description = $_POST['description'];
	$dateOpen = $_POST['startDate'];
	$dateClosed = $_POST['endDate'];
	$filename = '../upload/assignments/'."$courseCode";
	if (file_exists($filename)) {
		
	} else {
		mkdir('../upload/assignments/'."$courseCode", 0777, true);
	}
}
else{
	$name = $_POST['name'];
	$description = $_POST['description'];
	$filename = '../upload/file/'."$courseCode";
	//Setting untuk upload file
	$extension_list = array('png','jpg', 'pdf');
	$attachment = $_FILES['attachment']['name'];
	$x = explode('.', $attachment);
	$extension = strtolower(end($x));
	$size = $_FILES['attachment']['size'];
	$file_tmp = $_FILES['attachment']['tmp_name'];
	if(in_array($extension, $extension_list) === true){
		if($size < 1044070){
			if (file_exists($filename)) {
				$path = '../upload/file/'."$courseCode/$attachment";
				move_uploaded_file($file_tmp, '../upload/file/'."$courseCode/".$attachment);
				$sqlInputActivity = "INSERT INTO activities (`ID_AT`, `ID_C`, `title`, `id_topic`, `fileDir`) VALUES ('$acctypes','$idcourse', '$description', '$idtopic', '$path')";
				$mysqli->query($sqlInputActivity);
			} else {
				mkdir('../upload/file/'."$courseCode", 0777, true);
				$path = '../upload/file/'."$courseCode/$attachment";
				move_uploaded_file($file_tmp,'../upload/file/'."$courseCode/".$attachment);
				$sqlInputActivity = "INSERT INTO activities (`ID_AT`, `ID_C`, `title`, `id_topic`, `fileDir`, `description`) VALUES ('$acctypes','$idcourse', '$name', '$idtopic', '$path', '$description')";
				$mysqli->query($sqlInputActivity);
			}
		}
		else{
			echo "File melebihi Ukuran yang ditentukan";
		}
	}
	else{
		echo "Ekstensi File tidak diperbolehkan";
	}
	
}



?>