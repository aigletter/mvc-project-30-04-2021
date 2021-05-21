<?php

use core\Application;

ini_set('display_errors', '1');

include '../vendor/autoload.php';

$config = include '../config/main.php';

$app = Application::getInstance($config);

$app->run();