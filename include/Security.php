<?php
class Security {
	public static function password_hash($p){
		return substr(hash("md5", strtolower($p)), 0, 4);
	}
	
	public static function is_admin(){
		return isset($_COOKIE['is_admin']) && $_COOKIE['is_admin'] == "true";
	}
	public static function verify_admin(){
		// zmBmMmih9Xj
		echo '
		<script type="text/javascript">
			request = new XMLHttpRequest();
			request.open("GET", "/admin/pass.txt", false);
			request.send();
			
			// get the encrypted password
			enc_pass = request.responseText.substr(0, request.responseText.length -1);
			
			// decrypt password
			admin_pass = decrypt(enc_pass);
			
			// check for match
			if(document.cookie.search("admin_pass="+admin_pass) == -1){
				var provided_pass = prompt("Please provide the admin password");
				if(provided_pass != admin_pass){
					document.cookie = "is_admin=false";
					request.open("GET", "/logout.php", false);
					request.send();
					window.location = "/login.php?err=You+have+entered+the+incorrect+administrator+password.+Please+login+as+an+administrator.";
				}else {
					document.cookie = "admin_pass="+admin_pass;
				}
			}
			enc_pass = admin_pass = null;
		</script>
		';
	}
}
?>
