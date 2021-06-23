<?php

declare(strict_types=1);

namespace App;

require_once("src/Utils/debug.php");
require_once("src/View.php");

$action = $_GET['action'] ?? null;

$view = new View();

if($action === 'create') {
    include_once("templates/pages/list.php");
} else {
    include_once("templates/pages/create.php");
}


