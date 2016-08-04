<?php

include("includes.php");

$init_error = $error = ["required" => []];
$required = ["email"];


if(isset($_POST['submit'])){
	foreach($required as $item){
		if(!isset($_POST[$item]) || preg_match("/^\s*$/" , $_POST[$item])){
			$error["required"][] = $item;
		}
	}
	if(strtolower($_POST['email']) == strtolower($_SESSION['email'])){
		$error[] = "The email entered was not changed, so was not updated";
	}
	if($error === $init_error){
		$sth = $dbh->prepare('SELECT * FROM users WHERE id=:id');
		$sth->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
		$sth->execute();
		$results = $sth->fetchAll();
		$result = $results[0];
		if($sth->rowCount() == 0){
			$error[] = "Sorry, you don't have an account yet.";
		}elseif(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$sth = $dbh->prepare('SELECT * FROM users WHERE email=:email');
			$sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
			$sth->execute();
			if($sth->rowCount() == 0){
				$sth = $dbh->prepare('UPDATE users SET email=:email, password_hash=:password_hash WHERE id=:id');
				$sth->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
				$sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
				$sth->bindParam(':password_hash', Security::password_hash($_POST['email'].$_SESSION['password']), PDO::PARAM_STR);
				$sth->execute();
	
				$_SESSION['email'] = $_POST['email'];
		
				header('Status Code: HTTP/1.1 302 Found');
				header("Location: /update-email.php?success=".urlencode("Name was successfully changed"));
				die();
			}else {
				$error[] = "This email address is alerady registered to another account";
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
		header("Location: /update-email.php?$q");
	}
	
}



?>
