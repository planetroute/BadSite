<?php

include("includes.php");

?>


<html>
<head>
	<?php 
		HTMLBlocks::head_contents();
		Security::verify_admin();
	?>
</head>

<body>
	<div class="wrapper">
		<div class="container">
			<?php HTMLBlocks::page_header(); ?>
			<div class="content">
				<h3>Admin</h3>
				<div class="link-list">
					<a href="/users.php">Users</a>
					<a href="/add-search-item.php">Add Search Item</a>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>
