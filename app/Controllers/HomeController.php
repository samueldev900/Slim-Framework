<?php

declare(strict_types=1);

namespace App\Controllers;

use eftec\bladeone\BladeOne;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class HomeController
{
    public function __construct(private BladeOne $view) {}

    public function index(Request $request, Response $response): Response
    {
        $html = $this->view->run('home', [
            'title' => 'Home - Slim MVC'
        ]);

        $response->getBody()->write($html);
        return $response;
    }
}
