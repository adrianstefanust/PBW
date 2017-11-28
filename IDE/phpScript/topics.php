<?php 



$id = $_GET['id'];


$sqlGetCourseCode = "SELECT DISTINCT code FROM courses WHERE $id = courses.ID_C;";
$resultCourseCode = $mysqli->query($sqlGetCourseCode);
$rowCourseCode = $resultCourseCode->fetch_assoc();
$courseCode = $rowCourseCode["code"];
$rootPath = realpath("../../upload/assignments/$courseCode/answer/"); 

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
$sql = "SELECT DISTINCT id_topic, name FROM topic;";
$result = $mysqli->query($sql);

if($result && $result->num_rows > 0){
	while ($row = $result->fetch_assoc()) {

		$idTopic= $row["id_topic"];
		$name = $row["name"];

		?>
		<div class="w3-panel w3-card-2"><p style="font-size: 24px;"><i class="fa fa-newspaper-o"></i><?php echo "$name";?></p>
			<?php
			$sqlGetKontenTopik = "SELECT DISTINCT activities.title as title, activities.description as description, activities.fileDir as dir, activities.ID_AT as tipeFile, activities.ID_A as ida  FROM activities JOIN courses ON activities.ID_C = courses.ID_C WHERE $id = courses.ID_C AND activities.id_topic = $idTopic;";
			$resultKontenTopik = $mysqli->query($sqlGetKontenTopik);
			if($resultKontenTopik && $resultKontenTopik->num_rows > 0){
				while ($rowKontenTopik = $resultKontenTopik->fetch_assoc()) {
					
					$namaKonten = $rowKontenTopik["title"];
					$description = $rowKontenTopik["description"];
					$dir = $rowKontenTopik["dir"];
					$acc = $rowKontenTopik["tipeFile"];
					$_SESSION['ida'] = $rowKontenTopik["ida"];
					$_SESSION['id_course']  = $id;
					if($dir != ""){
						
						?>

						<p style="font-size: 18px;"><a href="<?php echo "../$dir"?>" download><?php echo "$namaKonten";?></a></p>
						<p style="font-size: 14px;"><?php echo "$description";?></p>

						<?php
						if($acc == 1){

							if($_SESSION['position'] == 'lecturer'){
								echo "<a href = ".'"../../phpScript/file.zip"'." download >Download Answer</a>";
							}
							else{
								?>
								
								<form method="post" enctype="multipart/form-data" action="../../phpScript/uploadAnswer.php">
									Upload File <input type="file" name="attachment"><br>
									<button type="submit"> UPLOAD </button><br>
									
								</form>
								<?php

							}
						}
						?>
						<hr>
						<?php
					}
					else{
						?>
						<p style="font-size: 18px;"><?php echo "$namaKonten";?></p>
						<p style="font-size: 14px;"><?php echo "$description";?></p>
						<?php
						if($acc == 1){

							if($_SESSION['position'] == 'lecturer'){
								echo "<a href = ".'"../../phpScript/file.zip"'." download >Download Answer</a>";
							}
							else{
								?>
								
								<form method="post" enctype="multipart/form-data" id="formUpload"><br>
									Upload File <input type="file" name="attachment" id="attachment-file"><br>
									<button type="submit" id="upload"> UPLOAD </button>
									
								</form>
								<?php

							}
						}
						?>
						<hr>
						<?php
					}
				}
			}

			if($_SESSION['position'] == 'lecturer'){
				?>
				<p><button onclick="document.getElementById('modal<?php echo "$idTopic"; ?>').style.display='block'" class='w3-button w3-grey w3-large'>Add Activity</button></p>
				<!--MODAL-->
				<div id="modal<?php echo $idTopic; ?>" class="w3-modal">
					<div class="w3-modal-content" style="width:550px;height:200px;"> 
						<header class="w3-container">
							<span onclick="document.getElementById('modal<?php echo "$idTopic"; ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

							<H3>SELECT ACTIVITY</H3><BR>
						</header>
						<div class="w3-container">
							<form method="get" action="<?php echo "addingActivity.php?id=$idTopic";?>">
								<input type="radio" name="activity" value="1" required> Assignment

								<br>
								<input type="radio" name="activity" value="2" required> File
								<br>
								<input type="text" name="id_topik" value="<?php echo "$idTopic";?>" hidden>
								<input type="text" name="id_course" value="<?php echo "$id";?>" hidden>
								<br>
								<button type="submit" class="w3-large w3-black w3-btn">ADD</button>
							</form>
						</div>
					</div>
				</div>	

				<?php

			}
			echo "</div>";
		}
		
	}

	?>
