<?php
class Security {
	public function password_hash($p){
		return substr(hash("md5", strtolower($p)), 0, 4);
	}
}
?>