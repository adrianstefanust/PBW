<?php 
$link = $_SESSION['position'];
if($link == 'student'){
    $link = 'std.php';
} 
else{
    $link = 'lct.php';
}
?>
<div style="width:25%; height: 75%;position:absolute" class="w3-theme-l4 w3-padding-left">
	<text style="margin-top:40px;display:block;">You are Logged in as</text>

	<text  style="margin-top:10px;display:block;font-weight: bold; font-size:19px"><?php echo $_SESSION['userid'];?></text>

	<text  style="margin-top:10px;display:block;font-weight: bold; font-size:19px"></text><?php echo $_SESSION['name'];?></text>

	<hr style="display: block;
    margin-top: 0.3em;
    margin-bottom: 30px;
    margin-left: 0px;
    height:5px;
    width:90%" class="w3-theme-l2">

    <img class="w3-border " src="../../img/profile.png"  width="130" height="130"><br>

    <div class="w3-margin-top" style="margin-left: 0px;">
        <ul style="list-style-type: none; padding-left: 10px;">
            <li><a href="<?php echo "$link"?>" style="text-decoration: none"><i  class = "fa fa-home " style="font-size:20px;margin-right:20px"></i> HOME</a></li>
            <li><a href="#" style="text-decoration: none"><i  class = "fa fa-list " style="font-size:20px;margin-right:20px ;margin-top:17px;"></i>MY COURSES</a><br></li>
            <li><a href="#" style="text-decoration: none"><i  class = "fa fa-user " style="font-size:20px;margin-right:20px ;margin-top:17px;"></i> MY PROFILE</a></li>
            <li><a href="../../phpScript/logout.php" style="text-decoration: none"><i  class = "fa fa-power-off" style="font-size:20px;margin-right:20px ;margin-top:17px;"></i>LOG OUT</a></li>
        </ul>
    </div>
</div>