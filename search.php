<?php

include("includes.php");

?>


<html>
<head>
	<?php HTMLBlocks::head_contents(); ?>
</head>

<body>
	<script type="text/javascript">
		var query = '<?php echo str_replace("'", "\'", htmlentities($_GET['q'])); ?>';
	</script>
	<div class="wrapper">
		<div class="container">
			<?php HTMLBlocks::page_header(); ?>
			
			<?php
			
			$sth = $dbh->prepare('SELECT * FROM search WHERE INSTR(name, :name) > 0');
			$sth->bindValue(':name', $_GET['q'], PDO::PARAM_STR);
			
			$sth->execute();
			$result = $sth->fetchAll();
			$n = $sth->rowCount();
			?>
			<div class="content">
				<div class="row"><h3><?php echo $n; ?> results for '<?php echo htmlentities($_GET['q']); ?>'</h3></div>
			<div class="search-results">
			<?php foreach($result as $row){ ?>
				<a class="result-row" href="/product.php?id=<?php echo $row['product_id']; ?>">
					<span class="result-title"><?php echo $row['name']; ?></span>
					<div class="result body">There are <?php echo $row['quantity']; ?> remaining.</div>
				</a>
			<?php } ?>			
			</div>
			</div>
		</div>
	</div>
</body>
</html>
