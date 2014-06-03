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
	    $sql = mysql_query("SELECT userID, firstname, lastname FROM users WHERE  lastname IN ('".$last."') AND email != '" . $_SESSION["userId"] . "
	    					' AND userId NOT IN (SELECT userFriend FROM friends WHERE userID = 
							(SELECT userID FROM users WHERE email = '".$_SESSION['userId']."'));");
	}
	else if ($first != '' && $last == '')
	{
	    $sql = mysql_query("SELECT userID, firstname, lastname FROM users WHERE firstname IN ('".$first."') AND email != '" . $_SESSION["userId"] . "
	    					' AND userId NOT IN (SELECT userFriend FROM friends WHERE userID = 
							(SELECT userID FROM users WHERE email = '".$_SESSION['userId']."'));");
	}
	else
	{
	    $sql = mysql_query("SELECT userID, firstname, lastname FROM users WHERE firstname IN ('".$first."') AND lastname IN ('".$last."') AND email != '" .
	    					$_SESSION["userId"] . " 'AND userId NOT IN (SELECT userFriend FROM friends WHERE userID = 
							(SELECT userID FROM users WHERE email = '".$_SESSION['userId']."'));");  
	}

	$data = array();

	if ($searchError == false)
	{
		$i = 0;

		while( $row = mysql_fetch_assoc($sql) ) 
		{
			$data[$i]["userID"] = $row["userID"];
			$data[$i]["firstname"] = $row["firstname"];
			$data[$i]["lastname"] = $row["lastname"];

			$i++;

	    }
	}

	return $data;

}

function addFriend()
{
	$friend = $_GET["v"];
	if ($friend != "")
	{
		$sql = mysql_query("INSERT INTO friends VALUES ((SELECT userID FROM USERS WHERE email = '".$_SESSION["userId"]."'), ".$friend.");");
	}
}

function displayFriends()
{
	$sql = mysql_query("SELECT userID, firstname, lastname FROM USERS WHERE userID IN 
						(SELECT userFriend FROM friends WHERE userID = 
							(SELECT userID FROM users WHERE email = '".$_SESSION['userId']."'));");

	$data = array();
	$i = 0;

	while( $row = mysql_fetch_assoc($sql) ) 
	{
		$data[$i]["userID"] = $row["userID"];
		$data[$i]["firstname"] = $row["firstname"];
		$data[$i]["lastname"] = $row["lastname"];

		$i++;
    }

    return $data;
}

function showFriends($array)
{
	$data = $array;

  	for ($i = 0; $i<count($data); $i++)
    {
    	print '<a href="?q=friends&a=profile&v='.$data[$i]["userID"].'">'.$data[$i]["firstname"].' '.$data[$i]["lastname"].'</a><br/>';
    }
}

function showSearch($array)
{
	$data = $array;

	print '<form>';
	for ($i = 0; $i<count($data); $i++)
	{
		print $data[$i]["firstname"].' '.$data[$i]["lastname"].'<br/>';
		print '<input type="button" name="add" value="Add '.$data[$i]["firstname"].' '.$data[$i]["lastname"].
		'" onclick="addFriend('.$data[$i]["userID"].')"/>';
		print '<br/>';
	}
	print '</form>';
}

function displayProfile()
{
	$friendAdded = mysql_query("SELECT email FROM users WHERE userID IN (SELECT userID FROM friends WHERE userFriend = ".$_GET["v"].");");
	$rowCheck = mysql_fetch_assoc($friendAdded);

	if ($rowCheck["email"] == $_SESSION["userId"])
	{
		$sqluser = mysql_query("SELECT firstname, lastname FROM users WHERE userID = ".$_GET["v"]);
		$rowuser = mysql_fetch_assoc($sqluser);
		$sqlprofile = mysql_query("SELECT * FROM content WHERE userID = ".$_GET["v"]); 
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
	else
	{
		print '<h3>Sorry! You\'re not friends with this person.';
	}
}
?>