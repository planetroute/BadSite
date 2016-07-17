<?php

include("html.php");

$init_error = $error = ["required" => []];
$required = ["secret_answer"];

if(isset($_GET['email'])){
	foreach($required as $item){
		if(!isset($_POST[$item]) || preg_match("/^\s*$/" , $_POST[$item])){
			$error["required"][] = $item;
		}
	}
	if($error === $init_error){
		$sth = $dbh->prepare('SELECT * FROM users WHERE email=:email');
		$sth->bindParam(':email', $_GET['email'], PDO::PARAM_STR);
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
	<script type="text/javascript" src="/javascript.js"></script>
	<link rel="stylesheet" type="text/css" href="/main.css"></link>
</head>

<body>
	<div class="wrapper">
		<div class="container">
			<?php header_code(); ?>
			<div class="register-box">
				<h3>Reset Password</h3>
				<?php
					if(isset($_GET['req'])){ ?>
					<ol class="error">
					<?php
						$required = explode(";", $_GET['req']);
						?>
						The following are required:
						<?php
						$z="";
						foreach($required as $item){
						?><li><?php echo htmlentities($z.$item); ?></li><?php
						$z=", ";
						}
						echo "."
						?>
					</ol>
					<?php
					}
					if(isset($_GET['err'])){ ?>
					<?php
						$error = explode(";", $_GET['err']);
						foreach($error as $item){
						?><ol class="error"><?php echo htmlentities($item); ?></ol><?php
						}
						?>
					<?php
					}
				 ?>
				<form method="POST" action="forgot-password3.php">
					<input type="text" name="code" placeholder="Reset Code" />
					<input type="password" name="new_password" placeholder="New Password" />
					<?php if(isset($_GET['email'])){echo "<input type='hidden' value='".urlencode($_GET['email'])."' />";} ?>
					<input type="submit" name="submit" value="Reset" />
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
