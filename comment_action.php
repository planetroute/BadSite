<?php

include("includes.php");

$init_error = $error = ["required" => []];
$required = ["comment", "user_id", "product_id"];


if(isset($_POST['submit'])){
	foreach($required as $item){
		if(!isset($_POST[$item]) || preg_match("/^\s*$/" , $_POST[$item])){
			$error["required"][] = $item;
		}
	}
	if(!isset($_SESSION['id'])){
		$error[] = "You must be logged in to comment";
	}
	if($error === $init_error){
		$sth = $dbh->prepare('SELECT * FROM users WHERE id=:id');
		$sth->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
		$sth->execute();
		if($sth->rowCount() != 0){
			$sth = $dbh->prepare('INSERT INTO comments (user_id, product_id, comment) VALUES (:user_id, :product_id, :comment)');
			$sth->bindValue(':user_id', $_POST['user_id'], PDO::PARAM_INT);
			$sth->bindValue(':product_id', $_POST['product_id'], PDO::PARAM_INT);
			$sth->bindValue(':comment', $_POST['comment'], PDO::PARAM_STR);
			
			$sth->execute();

			header('Status Code: HTTP/1.1 302 Found');
			if(isset($_GET['redirect'])){
				header('Location: ' . $_GET['redirect']);
			}else {
				header('Location: /product.php?id='.$_POST['product_id']);
			}
				
		}else {
			$error[] = "You don't have an account yet";
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
		if(!isset($_POST['product_id']) || preg_match("/^\s*$/" , $_POST['product_id'])){
			die("error: did not supply product id");
		}else{
			header("Location: /product.php?id=${_POST['product_id']}&$q");
		}
	}
	
}



?>
