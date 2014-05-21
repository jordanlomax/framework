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
	if($array["userId"])
	{
		$_SESSION["userId"] = $array["userId"];
		return true;
	}
	else
	{
		return false;
	}
}