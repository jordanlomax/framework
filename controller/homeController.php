<?php


# Include html header
include(APP_VIEW . "/header.php");

# Include main navigation
include(APP_VIEW . "/nav.php");

include(APP_MODEL . "/homeModel.php");

switch ( $_GET["a"] ) {

    case "home":
        include( APP_VIEW ."/home/homeView.php" );
        break;

    default:
        include( APP_VIEW ."/home/homeView.php" );
        break;
}


# Include html footer
include(APP_VIEW . "/footer.php");
