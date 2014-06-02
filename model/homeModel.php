<?php

function displayProfile()
{
	$sqluser = mysql_query("SELECT firstname, lastname FROM users WHERE email = '".$_SESSION["userID"]."'");
	$rowuser = mysql_fetch_assoc($sqluser);
	$sqlprofile = mysql_query("SELECT * FROM content WHERE userID = (SELECT userID FROM users where email = '" . $_SESSION["userId"] . "')"); 
	$rowprofile = mysql_fetch_row($sqlprofile);

	print '<h3>'.$rowuser["firstname"].' '.$rowuser["lastname"].'</h3>';

	if ($rowprofile[2] == true)
	{
		print '<img id="avatar" src="'.APP_IMG.'/'.$rowprofile[1].'">';
	}
	if ($rowprofile[4] == true)
	{
		print '<pre id="about">' . $rowprofile[3] . '</pre>';
	}
}