<?php

include("includes.php");

?>


<html>
<head>
	<script type="text/javascript" src="/javascript.js"></script>
	<link rel="stylesheet" type="text/css" href="/main.css"></link>
</head>

<body>
	<div class="wrapper">
		<div class="container">
			<?php HTMLBlocks::page_header(); ?>
			<div class="register-box">
				<h3>Login</h3>
				<?php URLErrors::display('no-protect'); ?>
				<form method="POST" action="login_action.php<?php if(isset($_GET['redirect'])){echo '?redirect=' . $_GET['redirect'];} ?>">
					<input type="text" name="email" placeholder="Email" />
					<input type="password" name="password" placeholder="Password" />
					<input type="submit" name="submit" value="Login" />
					<a href="/forgot-password.php" class="mini-link">Forgot your password?</a>
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
