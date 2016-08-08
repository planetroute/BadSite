<?php

include("includes.php");

$sth = $dbh->prepare('SELECT * FROM users WHERE id=:id');
$sth->bindValue(':id', $_COOKIE['id'], PDO::PARAM_INT);
$sth->execute();
$results = $sth->fetchAll();
$result = $results[0];

$security_question_options = [
			"What was your first school?",
			"What is your Mother's maiden name?",
			"What was the name of your first pet?",
			"What was your town of birth?",
			"What was the brand of your first car?"
];

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
				<h3>Security Question</h3>
				<?php URLErrors::display(); ?>
				<form method="POST" action="change-security-question_action.php">
					<select name="security_question" onchange="document.getElementsByName('answer')[0].value='';">
					<?php
						foreach($security_question_options as $question){
							echo '<option value="' . $question . '"' . (isset($result['secret_question']) && $result['secret_question'] == $question ? ' selected ' : '') . '>' . $question . '</option>';
						}
					
					?>
					</select>
					<input type="password" name="answer" placeholder="Answer" value="<?php echo (isset($result['secret_answer']) ? $result['secret_answer'] : ''); ?>" />
					<input type="submit" name="submit" value="Save" />
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
