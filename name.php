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
				<h3>Name</h3>
				<?php URLErrors::display(); ?>
				<form method="POST" action="name_action.php">
					<input type="text" name="first_name" value="<?php echo (isset($result['first_name']) ? $result['first_name'] : ''); ?>" placeholder="First Name" />
					<input type="text" name="last_name" value="<?php echo (isset($result['last_name']) ? $result['last_name'] : ''); ?>" placeholder="Last Name" />
					<input type="submit" name="submit" value="Save" />
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
