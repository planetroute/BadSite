<?php

include("includes.php");


$sth = $dbh->prepare('SELECT * FROM users WHERE id=:id');
$sth->bindValue(':id', $_COOKIE['id'], PDO::PARAM_INT);
$sth->execute();
$results = $sth->fetchAll();
$result = $results[0];
			
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
				<h3>Email</h3>
				<?php URLErrors::display(); ?>
				<form method="POST" action="update-email_action.php">
					<input type="text" name="email" value="<?php echo (isset($result['email']) ? $result['email'] : ''); ?>" placeholder="Email" />
					<input type="submit" name="submit" value="Save" />
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
