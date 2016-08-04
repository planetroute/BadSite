<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log", "./admin/error.log");

session_start();

error_log("SESSION: ".session_id()." owns any errors before next session declaration");

if(isset($_SESSION['first_name']) && isset($_SESSION['last_name']) &&
	 (!isset($_COOKIE['name']) || $_COOKIE['name'] != $_SESSION['first_name'] . " " . $_SESSION['last_name'])){
	setcookie("name", $_SESSION['first_name'] . " " . $_SESSION['last_name'], time()+ 60*60*24*14);
}

if(!isset($_COOKIE['is_admin'])){
	setcookie("is_admin", "false", time()+ 60*60*24*14);
}
?>
