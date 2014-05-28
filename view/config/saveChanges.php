<?php

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
}

function printConfig()
{
  print '
		<div>
		<form method="post">
		Show about section:<input type="checkbox" name="showAbout" value="show"'.$aboutChecked.'><br/>
		About:</br>
		<textarea name="about" row="6" col="50">'.$about.'</textarea><br/>
		<input type="submit" name="updateBtn" value="Save"/>
		</form>
		</div>';
}