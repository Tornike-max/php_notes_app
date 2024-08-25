<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../functions/helpers.php';

session_start();

use Controllers\Http\NoteController;
use Controllers\Http\SessionController;
use Controllers\Http\UserController;
use Core\Router;

$router = new Router();

$router->get('/', [NoteController::class, 'index']);
$router->get('/show', [NoteController::class, 'show']);
$router->get('/edit', [NoteController::class, 'edit']);
$router->put('/update', [NoteController::class, 'update']);
$router->delete('/delete', [NoteController::class, 'delete']);

$router->get('/create', [NoteController::class, 'create']);
$router->post('/store', [NoteController::class, 'store']);

$router->get('/users', [UserController::class, 'index']);
$router->get('/users/show', [UserController::class, 'show']);
$router->get('/users/create', [UserController::class, 'create']);
$router->post('/users/store', [UserController::class, 'store']);

$router->get('/session/login', [SessionController::class, 'login']);
$router->post('/session/attempt', [SessionController::class, 'loginUser']);

$router->delete('/session/logout', [SessionController::class, 'logout']);


$router->delete('/user/delete', [UserController::class, 'delete']);




$router->register();
