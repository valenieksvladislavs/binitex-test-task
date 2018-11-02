<?php
include('config.php');
include('student.php');
include('controller.php');
$controller = new controller();

$action = $_GET['action'] ? $_GET['action'] : 'index';

$content = $controller->$action();

echo $content;