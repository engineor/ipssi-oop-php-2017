<?php

use Application\Controller\IndexController;

if (!file_exists(__DIR__.'/vendor/autoload.php')) {
    throw new Exception('Exec composer install');
}
require __DIR__.'/vendor/autoload.php';

$requestedFile = substr(
    $_SERVER['REQUEST_URI'],
    0,
    strpos($_SERVER['REQUEST_URI'], '.')
);
if ($requestedFile[0] === '/') {
    $requestedFile = substr($requestedFile, 1);
}

$requestedFile = ucfirst($requestedFile);
$requestedClass = "\Application\Controller\\{$requestedFile}Controller";

if (!class_exists($requestedClass)) {
    throw new Exception('Page not found', 404);
}
echo (new IndexController())->indexAction();
