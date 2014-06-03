<?php

switch ( $_GET["a"] ) {

    case "login":
   		include(APP_VIEW . "/header.php");
    	include(APP_VIEW . "/nav.php");
        include( APP_VIEW ."/auth/loginView.php" );
        include(APP_VIEW . "/footer.php");
        break;

    case "logout":
	    // Destroy session and go home
	    $_SESSION = 0;
	    session_destroy();
	    header("Location: index.php");
	    break;

    case "processAuth":
    	if (processAuth($_POST))
    	{
    		header("location: index.php");
    	}
    	else
    	{
    		$formError = "Invalid Username or Password";
    		include(APP_VIEW . "/header.php");
    		include(APP_VIEW . "/nav.php");
        	include(APP_VIEW ."/auth/loginView.php" );
        	include(APP_VIEW . "/footer.php");
    	}
    	break;

    case "signup":
        if (processAuth($_POST))
        {
            header("location: index.php");
        }
        else
        {
            $formError = "Invalid Username or Password";
            include(APP_VIEW . "/header.php");
            include(APP_VIEW . "/nav.php");
            include(APP_VIEW ."/auth/loginView.php" );
            include(APP_VIEW . "/footer.php");
        }
        break;
}