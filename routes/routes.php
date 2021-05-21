<?php

/**
 * @var \core\Services\Routing\Router $this
 */

$this->get('/', function () {
    echo 'Home page';
});

$this->get('/user', [new \app\Controllers\UserController(), 'viewAction']);