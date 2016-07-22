<?php
class URLErrors {
	public function display($options){
		$noEscape = false;
		if(isset($options)){
			switch($options){
				case 'no-protect':
					$noEscape = true;
			}
		}
		if(isset($_GET['req'])){
			echo '<ol class="error">The following are required:';
			echo "<li>".htmlentities(implode(", ", explode(";", $_GET['req'])))."</li>";
			echo '</ol>';
		}
		if(isset($_GET['err'])){
			foreach(explode(";", $_GET['err']) as $error){
				echo '<ol class="error">'.($noEscape ? $error : htmlentities($error)).'</ol>';
			}
		}
		if(isset($_GET['success'])){
			foreach(explode(";", $_GET['success']) as $success){
				echo '<ol class="success">'.htmlentities($success).'</ol>';
			}
		}
	}
}
?>