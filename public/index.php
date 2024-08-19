<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../functions/helpers.php';

use Controllers\Http\NoteController;
use Core\Router;

$router = new Router();

$router->get('/', [NoteController::class, 'index']);
$router->get('/edit', [NoteController::class, 'edit']);
$router->put('/update', [NoteController::class, 'update']);


$router->get('/create', [NoteController::class, 'create']);

$router->register();
