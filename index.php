<?php

declare(strict_types=1);

namespace App;

use App\Exception\AppException;
use App\Exception\ConfigurationException;
use Throwable;

require_once "src/Utils/debug.php";
require_once "src/Controller.php";
require_once "src/Exception/AppException.php";

$configuration = require_once "config/config.php";

//error_reporting(0);
//ini_set('display_errors', '0');

$request = [
    'get' => $_GET,
    'post' => $_POST
];

try {
    Controller::initConfiguration($configuration);
    $controller = new Controller($request);
    $controller->run();
} catch(ConfigurationException $exception) {
    echo "Something went wrong with configuration";
} catch (AppException $exception) {
    echo "Something went wrong";
} catch (Throwable $exception) {
    echo "Something went wrong ;D";
}
