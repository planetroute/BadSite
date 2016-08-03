<?php

session_start();

if(isset($_SESSION['first_name']) && isset($_SESSION['last_name']) &&
	 (!isset($_COOKIE['name']) || $_COOKIE['name'] != $_SESSION['first_name'] . " " . $_SESSION['last_name'])){
	setcookie("name", $_SESSION['first_name'] . " " . $_SESSION['last_name'], time()+ 60*60*24*14);
}

if(!isset($_COOKIE['is_admin'])){
	setcookie("is_admin", "false", time()+ 60*60*24*14);
}
?>
