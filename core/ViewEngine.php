<?php

function render_template($template_name){
  return file_get_contents("templates/$template_name.html");
}

function render_view($view_name){
   include("views/$view_name.html");
}


?>