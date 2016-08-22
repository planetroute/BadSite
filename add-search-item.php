<?php

include("includes.php");
			
?>


<html>
<head>
	<?php 
		HTMLBlocks::head_contents();
		if(!Security::is_verified_admin()){
			header('Location: /admin.php');
		}
	?>
</head>

<body>
	<div class="wrapper">
		<div class="container">
			<?php HTMLBlocks::page_header(); ?>
			<div class="register-box">
				<h3>Add New Product</h3>
				<?php URLErrors::display(); ?>
				<form method="POST" action="add-search-item_action.php">
					<input type="text" name="item" placeholder="Product Name" />
					<input type="text" name="quantity" placeholder="Quantity" />
					<input type="submit" name="submit" value="Add" />
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
