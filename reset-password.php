<?php

include("html.php");

$init_error = $error = ["required" => []];
$required = ["code", "new_password", "email"];

if(isset($_POST['submit'])){
	foreach($required as $item){
		if(!isset($_POST[$item]) || preg_match("/^\s*$/" , $_POST[$item])){
			$error["required"][] = $item;
		}
	}
	if($error === $init_error){
		$sth = $dbh->prepare('SELECT * FROM users WHERE email=:email');
		$sth->bindParam(':email', urldecode($_POST['email']), PDO::PARAM_STR);
		$sth->execute();
		$results = $sth->fetchAll();
		$result = $results[0];
		
		if($sth->rowCount() == 0){
			$error[] = "Sorry, that email address was not recognised.";
		}else {
			if($_POST["code"] != $result['password_hash']){
				$error[] = "Sorry, you didn't provide the correct password reset code.";
			}else {
				$sth = $dbh->prepare('UPDATE users SET password_hash=:password_hash WHERE email=:email');
				$sth->bindParam(':email', urldecode($_POST['email']), PDO::PARAM_STR);
				$sth->bindParam(':password_hash', secure_password_hash($result['email'].$_POST['new_password']), PDO::PARAM_STR);
				$sth->execute();
				header('Status Code: HTTP/1.1 302 Found');
				header("Location: /login.php?success=".urlencode("Your password has been reset, please login below."));
				die();
			}
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
		if(isset($_POST['email'])){
			$q .= "email=".urlencode(urldecode($_POST['email']));
		}
		header('Status Code: HTTP/1.1 302 Found');
		header("Location: /forgot-password3.php?$q");
		die();
	}
}

?>
