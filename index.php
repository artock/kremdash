<?php 

require_once("__bootstrap.php");


if(isset($_GET["action"])){
	require_once("controllers/{$_GET["action"]}.php");
}

if (isset($_GET["view"])) {
	render_view($_GET["view"]);
}




 ?>


