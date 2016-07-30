<?php

include("includes.php");

$init_error = $error = ["required" => []];
$required = ["email", "first_name", "last_name", "password", "security_question", "answer"];


$security_question_options = [
			"What was your first school?",
			"What is your Mother's maiden name?",
			"What was the name of your first pet?",
			"What was your town of birth?",
			"What was the brand of your first car?"
];

if(isset($_POST['submit'])){
	foreach($required as $item){
		if(!isset($_POST[$item]) || preg_match("/^\s*$/" , $_POST[$item])){
			$error["required"][] = $item;
		}
	}
	if(!in_array($_POST['security_question'], $security_question_options, True)){
		$error[] = "Invalid security question";
	}
	if($error === $init_error){
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$sth = $dbh->prepare('SELECT * FROM users WHERE email=:email');
			$sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
			$sth->execute();
			if($sth->rowCount() == 0){
				$sth = $dbh->prepare('INSERT INTO users (first_name, last_name, email, password_hash, secret_question, secret_answer) VALUES	(:first_name, :last_name, :email, :password_hash, :secret_question, :secret_answer)');
				$sth->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);
				$sth->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR);
				$sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
				$sth->bindParam(':password_hash', Security::password_hash($_POST['email'].$_POST['password']), PDO::PARAM_STR);
				$sth->bindParam(':secret_question', $_POST['security_question'], PDO::PARAM_STR);
				$sth->bindParam(':secret_answer', $_POST['answer'], PDO::PARAM_STR);
				$sth->execute();
				$id = $dbh->lastInsertId();
				
				
				$_SESSION['id'] = $id;
				$_SESSION['first_name'] = $_POST['first_name'];
				$_SESSION['last_name'] = $_POST['last_name'];
				$_SESSION['email'] = $_POST['email'];
				
				setcookie("name", $_SESSION['first_name'] . " " . $_SESSION['last_name'], time()+ 60*60*24*14);
				setcookie("id", $id, time()+ 60*60*24*14);
				
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
