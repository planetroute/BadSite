<?php

include("includes.php");

$init_error = $error = ["required" => []];
$required = ["secret_answer"];

if(isset($_GET['email']) && isset($_POST['secret_answer'])){
	foreach($required as $item){
		if(!isset($_POST[$item]) || preg_match("/^\s*$/" , $_POST[$item])){
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
			if(strtolower($_POST['secret_answer']) != strtolower($result['secret_answer'])){
				$error[] = "Sorry, the answer to your secret question wasn't correct.";
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
		if(isset($_GET['email'])){
			$q .= "email=".urlencode(urldecode($_GET['email']));
		}
		header('Status Code: HTTP/1.1 302 Found');
		header("Location: /forgot-password2.php?$q");
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
				<h3>Reset Password</h3>
				<?php URLErrors::display(); ?>
				<form method="POST" action="reset-password.php">
					<input type="text" name="code" placeholder="Reset Code" />
					<input type="password" name="new_password" placeholder="New Password" />
					<?php if(isset($_GET['email'])){echo "<input type='hidden' name='email' value='".urlencode($_GET['email'])."' />";} ?>
					<input type="submit" name="submit" value="Reset" />
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
