<?php
session_start();
if(!isset($_COOKIE['name']) || $_COOKIE['name'] != $_SESSION['first_name'] . " " . $_SESSION['last_name']){
	setcookie("name", $_SESSION['first_name'] . " " . $_SESSION['last_name'], time()+ 60*60*24*14);
}
include("connect.php");
include("include/HTMLBlocks.php");
include("include/URLErrors.php");
include("include/Security.php");

?>