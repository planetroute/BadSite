<?php
class HTMLBlocks {
	public function head_contents(){ ?>
		<script type="text/javascript" src="/js/javascript.js"></script>
		<link rel="stylesheet" type="text/css" href="/stylesheets/main.css"></link>
	<?php
	}
	public function page_header(){
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
				<span class="name">Hi, <?php echo $_COOKIE['name']; ?>  | <a href="/logout.php">Logout</a></span>
				<?php 
				}else { ?>
				<span class="login-bar"><a href="/login.php">Login</a> | <a href="/register.php">Register</a></span>
				<?php } ?>
			</div>
		</div>	
	<?php
	}
}
?>
