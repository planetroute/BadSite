<?php
class HTMLBlocks {
	public function page_header(){
	?>
		<div class="header-container">
			<div class="header-content">
				<a href="/" class="block-wrap">
					<div class="logo-container">
						<img src="/shield.png" />
					</div>
					<div class="title-container">
						<h1>Secure<span class="asterix">*<img class="lock-bar" src="/lock-bar.png" /></span> Sites Ltd.<!-- SSL and names with identical acronyms are automatically secure ;-) --></h1>
						<h2>Robust Security&trade;</h2>
					</div>
				</a>
				<div class="link-container">

				</div>
				<div class="widget-container">
					<form action="search.php" method="GET">
						<input type="text" name="q" placeholder="Search" />
						<input type="submit" value="Go" />
					</form>
				</div>
				<?php if(isset($_COOKIE['PHPSESSID']) && isset($_COOKIE['name'])){ 
					if(isset($_SESSION['first_name']) && isset($_SESSION['last_name']) && $_COOKIE['name'] !== $_SESSION['first_name'] . " " . $_SESSION['last_name']){
						setcookie("name", $_SESSION['first_name'] . " " . $_SESSION['last_name'], time()+ 60*60*24*14);
					}
				?>
				<span class="name">Hi, <?php echo $_COOKIE['name']; ?>  | <a href="/logout.php">Logout</a></span>
				<?php }else { ?>
				<span class="login-bar"><a href="/login.php">Login</a> | <a href="/register.php">Register</a></span>
				<?php } ?>
			</div>
		</div>	
	<?php
	}
}
?>
