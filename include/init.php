<?php
ini_set('session.save_path', '/var/www/html/sessions');
session_start();

if(isset($_SESSION['first_name']) && isset($_SESSION['last_name']) &&
	 (!isset($_COOKIE['name']) || $_COOKIE['name'] != $_SESSION['first_name'] . " " . $_SESSION['last_name'])){
	setcookie("name", $_SESSION['first_name'] . " " . $_SESSION['last_name'], time()+ 60*60*24*14);
}
?>
