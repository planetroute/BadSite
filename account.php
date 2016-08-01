<?php

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
				<h3>Account</h3>
				<div class="link-list">
					<a href="/name.php">Name</a>
					<a href="/update-email.php">Email</a>
					<a href="/change-password.php">Password</a>
					<a href="/change-security-question.php">Security Question</a>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>
