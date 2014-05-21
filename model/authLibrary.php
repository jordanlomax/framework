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
	$username = mysql_query("SELECT email FROM users WHERE email = " . $array["userId"],$dbh);
	if($array["userId"] == $username)
	{
		$_SESSION["userId"] = $array["userId"];
		return true;
	}
	else
	{
		return false;
	}
}