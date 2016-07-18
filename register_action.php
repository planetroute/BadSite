<?php
session_start();
include("html.php");

$init_error = $error = ["required" => []];
$required = ["email", "first_name", "last_name", "password"];


if(isset($_POST['submit'])){
	foreach($required as $item){
		if(!isset($_POST[$item]) || preg_match("/^\s*$/" , $_POST[$item])){
			$error["required"][] = $item;
		}
	}
	if($error === $init_error){
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$sth = $dbh->prepare('SELECT * FROM users WHERE email=:email');
			$sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
			$sth->execute();
			if($sth->rowCount() == 0){
				$sth = $dbh->prepare('INSERT INTO users (first_name, last_name, email, password_hash) VALUES	(:first_name, :last_name, :email, :password_hash)');
				$sth->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);
				$sth->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR);
				$sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
				$sth->bindParam(':password_hash', secure_password_hash($_POST['email'].$_POST['password']), PDO::PARAM_STR);
				$sth->execute();
				$id = $dbh->lastInsertId();
				
				
				$_SESSION['id'] = $id;
				$_SESSION['first_name'] = $_POST['first_name'];
				$_SESSION['last_name'] = $_POST['last_name'];
				$_SESSION['email'] = $_POST['email'];
				
				setcookie("name", $_SESSION['first_name'] . " " . $_SESSION['last_name'], time()+ 60*60*24*14);
				
				header('Status Code: HTTP/1.1 302 Found');
				if(isset($_GET['redirect'])){
					header('Location: ' . $_GET['redirect']);
				}else {
					header('Location: /');
				}
				
				
			}else {
			 $error[] = "Email address already in use";
			}
		}else {
			$error[] = "Invalid email address";
		}
	}

	if($error !== $init_error){
		$q = "";
		if($error["required"] !== []){
			$q .= "req=" . str_replace("_", "%20", urlencode(implode(";", $error["required"]))) . "&";
		}
		unset($error["required"]);
		if($error !== []){
			$q .= "err=" . urlencode(implode(";", $error)) . "&";
		}
		if(isset($_GET['redirect'])){
			$q .= "redirect=" . $_GET['redirect'];
		}else{
			$q = substr($q, 0, strlen($q)-1);
		}
		header('Status Code: HTTP/1.1 302 Found');
		header("Location: /register.php?$q");
	}
	
}



?>
