<?php
if(explode("?", explode("/", $_SERVER['REQUEST_URI'])[1])[0] == "css"){

	switch(explode("?", $_SERVER['REQUEST_URI'])[1]){
		case "family=Montserrat:700":
			header('Content-Type: text/css; charset=utf-8');
			echo file_get_contents("fonts/Montserrat-700.css");
			die();
		case "family=Raleway:400,300,500":
			header('Content-Type: text/css; charset=utf-8');
			echo file_get_contents("fonts/Raleway-400-300-500.css");
			die();
	}
}
?>
