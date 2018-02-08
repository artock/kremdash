<?php

function render_component($component_name, $params){
   $component = file_get_contents("components/$component_name/component.html");
   $element_id = md5(rand(0,99999));

   $component = str_replace("root_element", "data-type='$component_name' data-uid='$element_id' id='$element_id' ", $component);

   $params["uid"] = $element_id;

   foreach($params as $key => $value){
   	  $component = str_replace('{' . "$key" . '}',$value,$component);
   }

   echo $component;
}

function render_base($component_name){
   require_once("components/$component_name/component.html");
}


?>