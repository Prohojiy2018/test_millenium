<?php

$dbname = $_ENV["MYSQL_DATABASE"];
$host = $_ENV["MYSQL_HOST"];
$db_user = $_ENV["MYSQL_USER"];
$db_password = $_ENV["MYSQL_PASSWORD"];

$db = new PDO("mysql:dbname=$dbname;host=$host", $db_user, $db_password);

$uri_elements = explode("?", $_SERVER['REQUEST_URI']);
$module = ltrim(array_shift($uri_elements), '/');
if (empty($module) || !in_array($module, scandir('modules'))) {
    exit ("Такой страницы не существует");
}

require_once('modules/' . $module . '/Model.php');
require_once('modules/' . $module . '/View.php');
require_once('modules/' . $module . '/Controller.php');

$namespace = ucfirst($module) . '\\';
$model_class = $namespace . 'Model';
$view_class = $namespace . 'View';
$controller_class = $namespace . 'Controller';

$model = new $model_class($db);
$view = new $view_class();
$controller = new $controller_class($model, $view);

$controller->index();