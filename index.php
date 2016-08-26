<?php


include("urimap.php");
include("includes.php");

?>


<html>
<head>
	<?php HTMLBlocks::head_contents(); ?>
</head>

<body>
	<div class="wrapper">
		<div class="container">
			<?php HTMLBlocks::page_header(); ?>
			
			<div class="content">
				<div class="main-area">
					<h3>Welcome to our secure online store!</h3>
					<h4>You can verify our online security using the security button!</h4>
				</div>
			</div>
			<div class="comments-container">
				<div class="comments">
					<h3>Featured Products</h3>
					<?php
						$sth = $dbh->prepare('SELECT * FROM search WHERE INSTR(name, :name) > 0 LIMIT 10');
						$sth->bindValue(':name', 'i', PDO::PARAM_STR);
			
						$sth->execute();
						$result = $sth->fetchAll();
						$n = $sth->rowCount();
					?>
					

					<?php foreach($result as $row){ ?>
						
						<div class="comment-row">
							<a href="/product.php?id=<?php echo $row['product_id']; ?>"><h4><?php echo $row['name']; ?></h4>
								<div class="comment-body">
									There are <?php echo $row['quantity']; ?> remaining.
								</div>
							</a>
						</div>
						
					<?php } ?>	
				</div>
			</div>
		</div>
	</div>
</body>
</html>
