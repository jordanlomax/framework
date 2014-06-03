<?php

$sqlvals= mysql_query("SELECT avatarShow, aboutShow, about FROM content WHERE userID = (SELECT userID FROM users where email = '" . $_SESSION["userId"] . "')"); 
$rowvals = mysql_fetch_row($sqlvals);
$avatarShow = $rowvals[0];
$aboutShow = $rowvals[1];
$about = $rowvals[2];

$aboutChecked = '';

if ($aboutShow == 1)
{
	$aboutChecked = 'checked';
}

function updateInfo()
{
	$subquery = "(SELECT userID FROM users WHERE email = '".$_SESSION["userId"]."')";

	if (isset($_POST['showAbout'])) {
	$sql = mysql_query('UPDATE content SET aboutShow=1 WHERE userID='.$subquery);
	}
		else
	{
		$sql = mysql_query('UPDATE content SET aboutShow=0 WHERE userID='.$subquery);
	}

	$sql = mysql_query("UPDATE content SET about='".addslashes($_POST['about'])."' WHERE userID=".$subquery);

	$sqlvals= mysql_query("SELECT about FROM content WHERE userID = (SELECT userID FROM users where email = '" . $_SESSION["userId"] . "')"); 
	$rowvals = mysql_fetch_row($sqlvals);
	$about = $rowvals[0];

	header("location: ".APP_DIR_ROOT."/index.php");
}

function updateAvatar()
{
	$sql = mysql_query("SELECT userID FROM users WHERE email = '".$_SESSION["userId"]."'");
	$rowvals = mysql_fetch_assoc($sql);
	$uid = $rowvals["userID"];

	if ($_FILES['avatarFile']['name'] != "")
	{
		$ext = explode('.', $_FILES['avatarFile']['name']);
		$ftype = $ext[1];

		$path = $uid.'_profile.'.$ftype;

		move_uploaded_file($_FILES["avatarFile"]["tmp_name"], 'img/'. $path) or 
		die( "ERROR: Unable to copy file");

/*		$finfo = finfo_open(FILEINFO_MIME_TYPE);
	    $mime=finfo_file($finfo, $_FILES['avatarFile']['name']);
	    if($mime=='image/bmp' || $mime=='image/png' || $mime=='image/jpeg')
	    {
			move_uploaded_file($_FILES["avatarFile"]["tmp_name"], 'img/'. $path) or 
			die( "ERROR: Unable to copy file");
	    }
	    finfo_close($finfo);*/

	    $sql = mysql_query("UPDATE content SET avatar ='".$path."' WHERE userID = (SELECT userID FROM users WHERE email ='".$_SESSION['userId']."');");
	}
}