<?php

include("includes.php");

?>


<html>
<head>
	<?php 
		HTMLBlocks::head_contents();
		Security::verify_admin();
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
				<a class="result-row" href="/product.php?id=<?php echo $row['product_id']; ?>">
					<span class="result-title"><?php echo htmlentities($row['email']); ?></span>
					<div class="result body"><code class="user-info">
					<?php 
						echo '<span class="info-title">first-name:</span> '.htmlentities($row['first_name']).'<br>';
						echo '<span class="info-title">last-name:</span> '.htmlentities($row['last_name']).'<br>';
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
