<?php

use MVC\src\Router;

$router = new Router();

$router->addRoute('/', UserController::class, 'index');
