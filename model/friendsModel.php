<?php

/*function loadFriends()
{
	$sqlvals= mysql_query("SELECT firstname, lastname FROM users WHERE userID = (SELECT userID FROM users where email = '" . $_SESSION["userId"] . "')"); 
	$rowvals = mysql_fetch_row($sqlvals);
	$avatarShow = $rowvals[0];
	$aboutShow = $rowvals[1];
	$about = $rowvals[2];
}

function searchFriends($name)
{
	$wspos = stripos($name," ");
	$first = substr($name, 0, $wspos - 1);
	$last = substr($name, $wspos);
	$url = "?q=friends&a=search&first=".$first."&last=".$last
	header("LOCATION: ".$url);
}*/

function displaySearch()
{
	//print_r($_GET);

	$searchError = false;
	$first = $_GET["first"];
	$last = $_GET["last"];
	$sql = '';

	//print '<pre>'.$first.' '.$last.'</pre>';

	if ($first == '' && $last == '')
	{
	    $searchError = true;
	}
	else if ($first == '' && $last != '')
	{
	    $sql = mysql_query("SELECT firstname, lastname FROM users WHERE  lastname IN ('".$last."') AND email != '" . $_SESSION["userId"] . "'");
	}
	else if ($first != '' && $last == '')
	{
	    $sql = mysql_query("SELECT firstname, lastname FROM users WHERE firstname IN ('".$first."') AND email != '" . $_SESSION["userId"] . "'");
	}
	else
	{
	    $sql = mysql_query("SELECT firstname, lastname FROM users WHERE firstname IN ('".$first."') AND lastname IN ('".$last."') AND email != '" .
	    $_SESSION["userId"] . "'");  
	}

	$data = array();

	if ($searchError == false)
	{
		$i = 0;

		while( $row = mysql_fetch_assoc($sql) ) 
		{
			$data[$i]["firstname"] = $row["firstname"];
			$data[$i]["lastname"] = $row["lastname"];

			$i++;

	    }
	}

	return $data;

}

?>