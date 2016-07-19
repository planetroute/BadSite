<?php
include("connect.php");
function header_code(){

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
		<?php if(isset($_COOKIE['PHPSESSID']) && isset($_COOKIE['name'])){ ?>
		<span class="name">Hi, <?php echo $_COOKIE['name']; ?>  | <a href="/logout.php">Logout</a></span>
		<?php }else { ?>
		<span class="name"><a href="/login.php">Login</a> | <a href="/register.php">Register</a></span>
		<?php } ?>
	</div>
</div>
<?php
}

function secure_password_hash($p){
	return substr(hash("md5", strtolower($p)), 0, 4);
}

function output_errors(){
	if(isset($_GET['req'])){ ?>
	<ol class="error">
	<?php
		$required = explode(";", $_GET['req']);
		?>
		The following are required:
		<?php
		$z="";
		echo "<li>";
		foreach($required as $item){
		?><?php echo htmlentities($z.$item); ?><?php
		$z=", ";
		}
		echo "</li>."
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
}
?>
