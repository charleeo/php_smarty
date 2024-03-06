<?php

use App\Http\Controllers\UserController;

$routes =  [
    '/' => [UserController::class,  'index'],
    '/success' => [UserController::class, 'success'],
];