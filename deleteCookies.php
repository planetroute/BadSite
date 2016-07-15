<?php
session_start();
session_destroy();
if(isset($_COOKIE)){
	foreach($_COOKIE as $name=>$value){
		setcookie($name, '', 1);
	}
}
