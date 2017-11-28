<?php
include ('startSession.php');
include ('connection.php');
$id_zip = $_SESSION['id_course'];
echo $id_zip;
$sqlGetCourseCode = "SELECT DISTINCT code FROM courses WHERE $id_zip = courses.ID_C;";
$resultCourseCode = $mysqli->query($sqlGetCourseCode);
$rowCourseCode = $resultCourseCode->fetch_assoc();
$courseCode = $rowCourseCode["code"];
$rootPath = realpath("../upload/assignments/$courseCode/answer/"); 

// Initialize archive object 
$zip = new ZipArchive(); 
$zip->open('file.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE); 

// Create recursive directory iterator 
$files = new RecursiveIteratorIterator( 
	new RecursiveDirectoryIterator($rootPath), 
	RecursiveIteratorIterator::LEAVES_ONLY 
); 

foreach ($files as $name => $file) 
{ 
	if (!$file->isDir()) 
	{ 
		$filePath = $file->getRealPath(); 
		$relativePath = substr($filePath, strlen($rootPath) + 1); 
		$zip->addFile($filePath, $relativePath); 
	} 
} 
$zip->close();

?>