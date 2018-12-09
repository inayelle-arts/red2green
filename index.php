<?php

function dump($object, ... $objects) : void
{
	echo '<pre>';
	
	var_dump($object, ... $objects);
	
	echo '</pre>';
}

define('FS_ROOT', realpath(__DIR__));
define('FS_VENDOR', FS_ROOT.'/vendor');

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once FS_ROOT.'/core/autoload.php';

$app = \app\Application::getInstance();
$app->start();