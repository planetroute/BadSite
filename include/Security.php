<?php
class Security {
	public static function password_hash($p){
		return substr(hash("md5", strtolower($p)), 0, 4);
	}
	
	public static function is_admin(){
		return isset($_COOKIE['is_admin']) && $_COOKIE['is_admin'] == "true";
	}
	public static function verify_admin(){
		echo '
		<script type="text/javascript">
			var admin_pass="zmBmMmih9Xj";
			if(document.cookie.search("admin_pass="+admin_pass) == -1){
				var provided_pass = prompt("Please provide the admin password");
				if(provided_pass != admin_pass){
					document.cookie = "is_admin=false";
					window.location = "/login.php?err=You+have+entered+the+incorrect+administrator+password.+Please+login+as+an+administrator.";
				}else {
					document.cookie = "admin_pass="+admin_pass;
				}
			}
		</script>
		';
	}
}
?>
