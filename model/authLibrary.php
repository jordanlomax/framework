<?php

function authCheck($array)
{
	if ($array["userId"])
	{
		if ($_SESSION["userData"] = md5("App Secure Key" . $_SERVER["REMOTE_ADDR"]))
		{
			return true;
		}
		else
		{
			$_SESSION = 0;
			session_destroy();
			return false;
		}
	}
	else
	{
		return false;
	}
}

function processAuth($array)
{
	$username = mysql_escape_string($array["userId"]);

	$sql = "SELECT * FROM users WHERE email = '" . $username . "'";
	$res = mysql_query($sql);

	$row = mysql_fetch_assoc($res);

	if(!$row)
	{
		return false;
	}
	else if (md5($array["password"]) != $row["password"])
	{
		return false;
	}
	else
	{
		$_SESSION["userId"] = $array["userId"];
		$_SESSION["userData"] = md5("App Secure Key" . $_SERVER["REMOTE_ADDR"]);
		return true;
	}
}

function createAccount($array)
{
	$username = mysql_escape_string($array["userId"]);
	$fname = $array["first"];
	$lname = $array["last"];
	$password = md5($array["first"]);

	$sql = mysql_query("SELECT email FROM users WHERE email = '" . $username . "'");	
	$row = mysql_fetch_assoc($sql);

	if (!$row)
	{
		mysql_query("INSERT INTO users (email,firstname,lastname,password) VALUES ('".$username."', '".$fname."', '".$lname."', '".$password."')");

		$sql = mysql_query("SELECT userID FROM users WHERE email ='".$username."'");
		$row = mysql_fetch_assoc($sql);

		mysql_query("INSERT INTO content (userID,avatar,avatarShow,about,aboutShow) VALUES ('".$row["userID"]."', 'test.png', 1, 'Welcome to my page!', 1)");

		$_SESSION["userId"] = $array["userId"];
		$_SESSION["userData"] = md5("App Secure Key" . $_SERVER["REMOTE_ADDR"]);
		return true;
	} 
	else
	{
		return false;
	}
}