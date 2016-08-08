<?php

include("includes.php");

$init_error = $error = ["required" => []];
$required = ["current_password", "new_password"];


if(isset($_POST['submit'])){
	foreach($required as $item){
		if(!isset($_POST[$item]) || preg_match("/^\s*$/" , $_POST[$item])){
			$error["required"][] = $item;
		}
	}
	
	if($error === $init_error){

		$sth = $dbh->prepare('SELECT * FROM users WHERE id=:id AND password_hash=:password_hash');
		$sth->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
		$sth->bindValue(':password_hash', Security::password_hash($_SESSION['email'].$_POST['current_password']), PDO::PARAM_STR);
		$sth->execute();
		$results = $sth->fetchAll();
		$result = $results[0];
		if($sth->rowCount() == 0){
			$error[] = "Current password is incorrect";
		}else {
			$sth = $dbh->prepare('UPDATE users SET password_hash=:password_hash WHERE id=:id');
			$sth->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
			$sth->bindValue(':password_hash', Security::password_hash($_SESSION['email'].$_POST['new_password']), PDO::PARAM_STR);
			$sth->execute();
	
		
			header('Status Code: HTTP/1.1 302 Found');
			header("Location: /change-password.php?success=".urlencode("Password successfully changed"));
			die();
		
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
		header("Location: /change-password.php?$q");
	}
	
}



?>
