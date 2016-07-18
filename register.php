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
			<div class="content">
				<div class="register-box">
					<h3>Register</h3>
					<?php
						if(isset($_GET['req'])){ ?>
						<ol class="error">
						<?php
							$required = explode(";", $_GET['req']);
							?>
							The following are required:
							<?php
							$z="";
							foreach($required as $item){
							?><li><?php echo htmlentities($z.$item); ?></li><?php
							$z=", ";
							}
							echo "."
							?>
						</ol>
						<?php
						}
						if(isset($_GET['err'])){ ?>
						<?php
							$error = explode(";", $_GET['err']);
							foreach($error as $item){
							?><ol class="error"><?php echo htmlentities($item); ?></ol><?php
							}
							?>
						<?php
						}
					 ?>
					<form method="POST" action="register_action.php<?php if(isset($_GET['redirect'])){echo '?redirect=' . $_GET['redirect'];} ?>">
						<input type="text" name="first_name" placeholder="First Name" />
						<input type="text" name="last_name" placeholder="Last Name" />
						<input type="text" name="email" placeholder="Email" />
						<input type="password" name="password" placeholder="Password" />
						<select name="security_question">
							<option value="" disabled selected>Please select a security question</option>
						
							<option value="What was your first school?">What was your first school?</option>
							<option value="What is your Mother's maiden name?">What is your Mother's maiden name?</option>
							<option value="What was the name of your first pet?">What was the name of your first pet?</option>
							<option value="What was your town of birth?">What was your town of birth?</option>
							<option value="What was the brand of your first car?">What was the brand of your first car?</option>
						</select>
						<input type="text" name="answer" placeholder="Answer" />
						<input type="submit" name="submit" value="Register" />
					</form>
				</div>	
			</div>
		</div>
	</div>
</body>
</html>
