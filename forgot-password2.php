<?php

include("includes.php");

$init_error = $error = ["required" => []];
$required = ["email"];

if(isset($_GET['email'])){
	foreach($required as $item){
		if(!isset($_GET[$item]) || preg_match("/^\s*$/" , $_GET[$item])){
			$error["required"][] = $item;
		}
	}
	if($error === $init_error){
		$sth = $dbh->prepare('SELECT * FROM users WHERE email=:email');
		$sth->bindValue(':email', $_GET['email'], PDO::PARAM_STR);
		$sth->execute();
		$results = $sth->fetchAll();
		$result = $results[0];
		if($sth->rowCount() == 0){
			$error[] = "Sorry, that email address was not recognised.";
		}else {
			$secret_question = $result['secret_question'];
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
		}else{
			$q = substr($q, 0, strlen($q)-1);
		}
		header('Status Code: HTTP/1.1 302 Found');
		header("Location: /forgot-password.php?$q");
		die();
	}
}

?>


<html>
<head>
	<?php HTMLBlocks::head_contents(); ?>
</head>

<body>
	<div class="wrapper">
		<div class="container">
			<?php HTMLBlocks::page_header(); ?>
			<div class="register-box">
				<h3>Request a Password Reset Code</h3>
				<?php URLErrors::display(); ?>
				<form method="POST" action="forgot-password3.php<?php if(isset($_GET['email'])){echo "?email=".urlencode($_GET['email']);} ?>">
					<?php if(isset($secret_question)){echo "Secret Question:<br>".$secret_question;} ?>
					<input type="text" name="secret_answer" placeholder="Secret Answer" />
					<input type="submit" value="Submit" />
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
