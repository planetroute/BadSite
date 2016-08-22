<?php

include("includes.php");

?>


<html>
<head>
	<?php 
		HTMLBlocks::head_contents();
		if(!Security::is_verified_admin()){
			header('Location: /admin.php');
		}
	?>
</head>

<body>
	<div class="wrapper">
		<div class="container">
			<?php HTMLBlocks::page_header(); ?>
			
			<?php
			
			$sth = $dbh->prepare('SELECT * FROM users');
			$sth->execute();
			$result = $sth->fetchAll();
			$n = $sth->rowCount();
			?>
			<div class="content">
				<div class="row"><h3>Users</h3></div>
			<div class="search-results">
			<?php foreach($result as $row){ ?>
				<a class="result-row">
					<span class="result-title"><?php echo htmlentities($row['email']); ?></span>
					<div class="result body"><code class="user-info">
					<?php 
						echo '<span class="info-title">first-name:</span> '.htmlentities($row['first_name']).'<br>';
						echo '<span class="info-title">last-name:</span> '.htmlentities($row['last_name']).'<br>';
						echo '<span class="info-title">security question:</span> '.htmlentities($row['secret_question']).'<br>';
						echo '<span class="info-title">answer:</span> '.htmlentities($row['secret_answer']).'<br>';
						echo '<span class="info-title">admin:</span> '.($row['is_admin'] === '1' ? 'yes' : 'no').'<br>';
						echo '<span class="info-title">password-hash:</span> '.htmlentities($row['password_hash']).'<br>';
					?>
					</code></div>
				</a>
			<?php } ?>			
			</div>
			</div>
		</div>
	</div>
</body>
</html>
