<?php

include("includes.php");
include("connect-user.php");

?>


<html>
<head>
	<?php HTMLBlocks::head_contents(); ?>
</head>

<body>
	<div class="wrapper">
		<div class="container">
			<?php HTMLBlocks::page_header(); ?>
			
			<?php
			
			$sth = $dbh->prepare('SELECT * FROM search WHERE product_id=:id');
			$sth->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
			$sth->execute();
			$results = $sth->fetchAll();
			$result = $results[0];
			?>
			<div class="content">
				<h3><?php echo $result['name']; ?></h3>
				<div class="row">Quantity <?php echo $result['quantity']; ?></div>		
			</div>
			<?php
				$sth = $dbh->prepare('SELECT user_id, comment FROM comments WHERE product_id='.$_GET['id']);
				$sth->execute();
				$comments = $sth->fetchAll();
				$n = $sth->rowCount();
			?>
			
			<div class="comments-container">
				<?php
				if(isset($_SESSION['id'])){ ?>
				<div class="comments-form">
					<?php URLErrors::display(); ?>
					<form action="comment_action.php" method="POST">
						<textarea name="comment" placeholder="Write a comment..."></textarea>
						<input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
						<input type="hidden" name="product_id" value="<?php echo urlencode($_GET['id']); ?>">
						<input type="submit" name="submit" value="Comment" /><br>
					</form>
				</div>
				<?php }else { ?>
					<div class="comments-form"><a href="/login.php<?php echo (isset($_SERVER['REQUEST_URI']) ? '?redirect='.urlencode($_SERVER['REQUEST_URI']) : ''); ?>">Login</a> to make a comment.</div>
				<?php } ?>
				<div class="comments">
					<h3><?php echo $n; ?> Comment<?php echo ($n != 1 ? 's' : ''); ?></h3>
					<?php
					foreach($comments as $comment){
						$sth = $dbh->prepare('SELECT * FROM users WHERE id=:id');
						$sth->bindParam(':id', $comment[0], PDO::PARAM_INT);
						$sth->execute();
						$results = $sth->fetchAll();
						echo '
						<div class="comment-row">
							<h4>' . htmlentities($results[0]['first_name']) . '</h4>
							<div class="comment-body">
								' . htmlentities($comment[1]) . '
							</div>
						</div>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
