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
				<h3>Forgot Password</h3>
				<?php URLErrors::display(); ?>
				<form method="GET" action="forgot-password2.php">
					<input type="text" name="email" placeholder="Email" />
					<input type="submit" value="Submit" />
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
