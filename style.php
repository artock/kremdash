<?php

 header("Content-type: text/css");

 $dirs = glob("components/*");

 foreach ($dirs as $dir) {
 	if(is_dir($dir) && file_exists("$dir/component.css")){
 		echo str_replace("\r\n","",file_get_contents("$dir/component.css"));
 	}
 }

?>