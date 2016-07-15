<?php
session_start();
include("html.php");

$init_error = $error = ["required" => []];
$required = ["email", "password"];


if(isset($_POST['submit'])){
	/*foreach($required as $item){
		if(!isset($_POST[$item]) || preg_match("/^\s*$/" , $_POST[$item])){
			$error["required"][] = $item;
		}
	}*/
	foreach($_POST as $name=>$value){if(ctype_digit($value)){$_POST[$name]=intval($value);}}
	if($error === $init_error){
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$sth = $dbh->prepare('SELECT * FROM users WHERE email=:email');
			$sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
			$sth->execute();
			$results = $sth->fetchAll();
			$result = $results[0];
			if($sth->rowCount() == 0){
				$error[] = "Sorry, you don't have an account yet. Would you like to <a href='/register.php" . (isset($_GET['redirect']) ? '?redirect=' . urlencode($_GET['redirect']) : '') . "'>create</a> one?";
			}else if($result['password'] == $_POST['password']){
				$_SESSION['id'] = $result['id'];
				$_SESSION['first_name'] = $result['first_name'];
				$_SESSION['last_name'] = $result['last_name'];
				$_SESSION['email'] = $result['email'];
				
				setcookie("name", $result['first_name'] . " " . $result['last_name'], time()+ 60*60*24*14);
				
				header('Status Code: HTTP/1.1 302 Found');
				if(isset($_GET['redirect'])){
					header('Location: ' . $_GET['redirect']);
				}else {
					header('Location: /');
				}
				
			}else {
				$error[] = "Incorrect password";
				
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
		header("Location: /login.php?$q");
	}
	
}



?>
