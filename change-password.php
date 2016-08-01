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
			<div class="register-box">
				<h3>Change Password</h3>
				<?php URLErrors::display(); ?>
				<form method="POST" action="change-password_action.php">
					<input type="password" name="current_password" placeholder="Current" />
					<input type="password" name="new_password" placeholder="New Password" />
					<input type="submit" name="submit" value="Save" />
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
