<?php
include("connect.php");
function header_code(){

?>
<div class="header-container">
	<div class="header-content">
		<a href="/" class="block-wrap">
			<div class="logo-container">
				<img src="/lock.png" />	
			</div>
			<div class="title-container">
				<h1>Secure* Websites Inc.</h1>
				<h2>Robust Security&trade;<img src="/shield.png" class="certified-png"></h2>
			</div>
		</a>
		<div class="link-container">

		</div>
		<div class="widget-container">
			<form action="search.php" method="GET">
				<input type="text" name="q" placeholder="Search" />
				<input type="submit" value="Go" />
			</form>
		<?php if(isset($_COOKIE['PHPSESSID']) && isset($_COOKIE['name'])){ ?>
		<span class="name">Hi, <?php echo $_COOKIE['name']; ?></span>
		<?php }else { ?>
		<span class="name"><a href="/login.php">Login</a> | <a href="/register.php">Register</a></span>
		<?php } ?>
		</div>
	</div>
</div>
<?php
}
?>
