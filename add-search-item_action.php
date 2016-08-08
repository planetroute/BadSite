<?php

include("includes.php");

$init_error = $error = ["required" => []];
$required = ["item", "quantity"];


if(isset($_POST['submit'])){
	foreach($required as $item){
		if(!isset($_POST[$item]) || preg_match("/^\s*$/" , $_POST[$item])){
			$error["required"][] = $item;
		}
	}
	if(!ctype_digit($_POST['quantity'])){
		$error[] = "Quantity must be an integer";
	}
	if($error === $init_error){
		$sth = $dbh->prepare('INSERT INTO search (name, quantity) VALUES (:item, :quantity)');
		$sth->bindValue(':item', $_POST['item'], PDO::PARAM_STR);
		$sth->bindValue(':quantity', $_POST['quantity'], PDO::PARAM_INT);
		
		$sth->execute();
		$id = $dbh->lastInsertId();

		header('Status Code: HTTP/1.1 302 Found');
		header("Location: /product.php?id=".urlencode($id));
		die();
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
		header("Location: /add-search-item.php?$q");

	}
	
}



?>
