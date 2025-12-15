<?php

declare(strict_types=1);

use DI\Container;
use eftec\bladeone\BladeOne;
use Illuminate\Database\Capsule\Manager as Capsule;

return function (Container $container): void {

    // PDO / Eloquent continuam OK
    $container->set(Capsule::class, require __DIR__ . '/database.php');

    $container->set(BladeOne::class, function () {
        return new BladeOne(
            __DIR__ . '/../app/Views',
            __DIR__ . '/../public/cache/views',
            BladeOne::MODE_AUTO
        );
    });
};
