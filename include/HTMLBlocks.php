<?php
class HTMLBlocks {
	public static function head_contents(){ ?>
	<script type="text/javascript" src="/js/javascript.js"></script>
		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="/stylesheets/main.css" />
		<title>Secure Sites Ltd.</title>
	<?php
	}
	public static function page_header(){
	?>
		<div class="header-container">
			<div class="header-content">
				<a href="/" class="block-wrap">
					<div class="logo-container">
						<img src="/images/shield.png" />
					</div>
					<div class="title-container">
						<h1>Secure<span class="asterix">*<img class="lock-bar" src="/images/lock-bar.png" /></span> Sites Ltd.<!-- SSL and names with identical acronyms are automatically secure ;-) --></h1>
						<h2>Robust Security&trade;</h2>
					</div>
				</a>
				<div class="link-container">
				<?php
					if(Security::is_admin()){ ?>
						<a href="/admin.php">Admin Settings</a>
				<?php } ?>
				</div>
				<div class="widget-container">
					<form action="search.php" method="GET">
						<input type="text" name="q" placeholder="Search" />
						<input type="submit" value="Go" />
					</form>
				</div>
				<?php 
				if(isset($_SESSION['first_name'])){ 
				?>
				<span class="name">Hi, <?php echo $_COOKIE['name']; ?>  | <a href="/account.php">Settings</a> | <a href="/logout.php">Logout</a></span>
				<?php 
				}else { ?>
				<span class="login-bar"><a href="/login.php">Login</a> | <a href="/register.php">Register</a></span>
				<?php } ?>
			</div>
		</div>
		<div class="secure-check"><a href="javascript:verifySecurity()"><h3><img src="/images/shield.png" /> PNG Verified</h3><div id="secure-load"></div></a></div>	
	<?php
	}
}
?>
