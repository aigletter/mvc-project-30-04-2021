<?php

/**
 * @var \core\Services\Routing\Router $this
 */

$this->get('/', function () {
    echo 'Home page';
});

$this->get('/user', [new \app\Controllers\UserController(), 'viewAction']);

$this->get('/page', function ($id) {
    // ...
});
$this->get('/student', function ($name, $age = null) {

});