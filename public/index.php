<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use DI\Container;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;

// Carrega .env (se existir)
if (file_exists(__DIR__ . '/../.env')) {
    Dotenv::createImmutable(__DIR__ . '/..')->load();
}
// Container
$container = new Container();
(require __DIR__ . '/../config/container.php')($container);
$container->get(\Illuminate\Database\Capsule\Manager::class);


AppFactory::setContainer($container);
$app = AppFactory::create();

// Middlewares úteis
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

// Rotas
(require __DIR__ . '/../app/Routes/web.php')($app);

$app->run();

