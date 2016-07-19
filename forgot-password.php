<?php

include("html.php");

?>


<html>
<head>
	<script type="text/javascript" src="/javascript.js"></script>
	<link rel="stylesheet" type="text/css" href="/main.css"></link>
</head>

<body>
	<div class="wrapper">
		<div class="container">
			<?php header_code(); ?>
			<div class="register-box">
				<h3>Forgot Password</h3>
				<?php
					output_errors();
				 ?>
				<form method="GET" action="forgot-password2.php">
					<input type="text" name="email" placeholder="Email" />
					<input type="submit" value="Submit" />
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
