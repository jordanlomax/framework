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