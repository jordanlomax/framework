<?php


# Include html header
include(APP_VIEW . "/header.php");

# Include main navigation
include(APP_VIEW . "/nav.php");


switch ( $_GET["a"] ) {

    case "config":
        include( APP_VIEW ."/config/configView.php" );
        break;

    default:
        include( APP_VIEW ."/config/configView.php" );
        break;
}


# Include html footer
include(APP_VIEW . "/footer.php");
