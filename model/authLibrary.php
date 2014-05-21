<?php

function authCheck($array)
{
	if ($array["userId"])
	{
		return true;
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
		return true;
	}
}