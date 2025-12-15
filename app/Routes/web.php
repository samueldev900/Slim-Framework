<?php

declare(strict_types=1);

use Slim\App;
use App\Controllers\HomeController;
use App\Controllers\ProductController;

return function (App $app): void {
    $app->get('/', [HomeController::class, 'index']);

    // Produtos
    $app->get('/products', [ProductController::class, 'index']);
    $app->get('/products/create', [ProductController::class, 'create']);
    $app->post('/products', [ProductController::class, 'store']);
};
