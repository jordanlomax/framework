<?php


# Include html header
include(APP_VIEW . "/header.php");

# Include main navigation
include(APP_VIEW . "/nav.php");

include (APP_MODEL . "/friendsModel.php");

switch ( $_GET["a"] ) {

    case "friends":
        //include( APP_VIEW ."/friends/friendsSubNav.php" );
        include( APP_VIEW ."/friends/friendsView.php" );
        break;

    case "search":
    	$data = displaySearch();
    	include( APP_VIEW ."/friends/searchView.php" );
        break;

    default:
        //include( APP_VIEW ."/friends/friendsSubNav.php" );
        include( APP_VIEW ."/friends/friendsView.php" );
        break;
}


# Include html footer
include(APP_VIEW . "/footer.php");
