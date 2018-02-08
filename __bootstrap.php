<?php 

require("config.php");
$core = glob("core/*.php");

foreach ($core as $file) {
	require_once($file);
}

$models = glob("models/*.php");

foreach ($models as $model) {
	require_once($model);
}

R::setup('mysql:host='.APPCFG['database']['host'].';dbname='.APPCFG['database']['dbname'], APPCFG['database']['user'], APPCFG['database']['pass'] );

?>

