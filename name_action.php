<?php

include("includes.php");

$init_error = $error = ["required" => []];
$required = ["first_name", "last_name"];


if(isset($_POST['submit'])){
	foreach($required as $item){
		if(!isset($_POST[$item]) || preg_match("/^\s*$/" , $_POST[$item])){
			$error["required"][] = $item;
		}
	}
	if($error === $init_error){
		$sth = $dbh->prepare('SELECT * FROM users WHERE id=:id');
		$sth->bindValue(':id', $_COOKIE['id'], PDO::PARAM_INT);
		$sth->execute();
		$results = $sth->fetchAll();
		$result = $results[0];
		if($sth->rowCount() == 0){
			$error[] = "Sorry, you don't have an account yet.";
		}else {
			$sth = $dbh->prepare('UPDATE users SET first_name=:first_name, last_name=:last_name WHERE id=:id');
			$sth->bindValue(':id', $_COOKIE['id'], PDO::PARAM_INT);
			$sth->bindValue(':first_name', $_POST['first_name'], PDO::PARAM_STR);
			$sth->bindValue(':last_name', $_POST['last_name'], PDO::PARAM_STR);
			$sth->execute();
		
			$_SESSION['first_name'] = $_POST['first_name'];
			$_SESSION['last_name'] = $_POST['last_name'];
			
			setcookie("name", $_POST['first_name'] . " " . $_POST['last_name'], time()+ 60*60*24*14);
			
			header('Status Code: HTTP/1.1 302 Found');
			header("Location: /name.php?success=".urlencode("Name was successfully changed"));
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
		header("Location: /login.php?$q");
	}
	
}



?>
