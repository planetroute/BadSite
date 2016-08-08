<?php

include("includes.php");

$init_error = $error = ["required" => []];
$required = ["security_question", "answer"];

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
		$sth = $dbh->prepare('SELECT * FROM users WHERE id=:id');
		$sth->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
		$sth->execute();
		$results = $sth->fetchAll();
		$result = $results[0];
		if($sth->rowCount() == 0){
			$error[] = "Sorry, you don't have an account yet.";
		}else {
			$sth = $dbh->prepare('UPDATE users SET secret_question=:secret_question, secret_answer=:secret_answer WHERE id=:id');
			$sth->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
			$sth->bindValue(':secret_question', $_POST['security_question'], PDO::PARAM_STR);
			$sth->bindValue(':secret_answer', $_POST['answer'], PDO::PARAM_STR);
			$sth->execute();

			
			header('Status Code: HTTP/1.1 302 Found');
			header("Location: /change-security-question.php?success=".urlencode("Question/answer successfully changed"));
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
		header("Location: /change-security-question.php?$q");
	}
	
}



?>
