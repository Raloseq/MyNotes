<?php

declare(strict_types=1);

spl_autoload_register(function (string $classNamespace) {
    $path = str_replace(['\\','App'],['/',''], $classNamespace);
    $path = "src/.$path.php";
    require_once($path);
});

require_once "src/Utils/debug.php";

use App\Controller\AbstractController;
use App\Controller\NoteController;
use App\Request;
use App\Exception\AppException;
use App\Exception\ConfigurationException;

$configuration = require_once "config/config.php";

//error_reporting(0);
//ini_set('display_errors', '0');

$request = new Request($_GET,$_POST, $_SERVER);

try {
    AbstractController::initConfiguration($configuration);
    $controller = new NoteController($request);
    $controller->run();
} catch(ConfigurationException $exception) {
    echo "Something went wrong with configuration";
} catch (AppException $exception) {
    echo "Something went wrong";
} catch (Throwable $exception) {
    echo "Something went wrong ;D";
}
