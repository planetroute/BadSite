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
					<a href="/name.php">Change Name</a>
					<a href="/change-password.php">Change Password</a>
					<a href="/change-security-question.php">Change Security Question</a>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>
