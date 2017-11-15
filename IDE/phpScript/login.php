<?php
include('connection.php');
include ('startSession.php');
if (empty($_POST['username']) || empty($_POST['psw'])) {
	header("Location: ../index.php");
}
else{
	$username = $_POST['username'];
	$password = $_POST['psw'];
	$sql = "SELECT username FROM users WHERE username = '$username'";
	$result = $mysqli->query($sql);
	if($result && $result->num_rows > 0){
		$sql2 = "SELECT username, pass FROM users WHERE username = '$username' AND pass= '$password'";
		$result2 = $mysqli->query($sql2);
		if($result2 && $result2->num_rows > 0){
			$sql3 = "SELECT users.ID_U as id, users.username as username, users.pass as pass, users.userID as userid, users.name as name, usergroups.name as position FROM users JOIN usergroups ON users.ID_UG = usergroups.ID_UG WHERE username = '$username' AND pass= '$password'";
			$result3 = $mysqli->query($sql3);
			if($result3 && $result->num_rows > 0){
				$row = $result3->fetch_array();
				$_SESSION['id'] = $row["id"];
				$_SESSION['username'] = $row["username"];
				$_SESSION['pass'] = $row["pass"];
				$_SESSION['userid'] = $row["userid"];
				$_SESSION['name'] = $row["name"];
				$role = $row["position"];
				$_SESSION['position'] = $role;
				if($role == 'student'){
					header("Location: ../pages/student/std.php");
				}
				else{
					header("Location: ../pages/lecturer/lct.php");
				}
			}
		}
		else{
			echo "WRONG PASSWORD";
		}
	}
	else{
		echo "WRONG USERNAME";
	}
}
?>