<?php
define('ROOT_PATH', realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..') . DIRECTORY_SEPARATOR);
define('TEMPLATES_PATH', str_replace('\\', DIRECTORY_SEPARATOR, $_SERVER['DOCUMENT_ROOT']) . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR . 'Templates');

require_once 'vendor/autoload.php';

$url = explode('/', $_SERVER['REQUEST_URI']);

array_shift($url);

$className = ucfirst(array_shift($url)) . 'Controller';
$methodName = array_shift($url);

$classFullName = 'Controller\\' . $className;

$obj = new $classFullName();

call_user_func_array([$obj, $methodName], $url);