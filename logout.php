<?php
session_start();
session_destroy();
if(isset($_COOKIE)){
	foreach($_COOKIE as $name=>$value){
		setcookie($name, '', 1);
	}
}
header('Status Code: HTTP/1.1 302 Found');
header("Location: /");
