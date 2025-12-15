<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Product;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use eftec\bladeone\BladeOne;

final class ProductController
{
    public function __construct(
        private BladeOne $view,
    ) {}

    public function index(Request $request, Response $response): Response
    {
        $products = Product::query()
            ->orderByDesc('id')
            ->get();

        $html = $this->view->run('products.index', [
            'title' => 'Home - Slim MVC',
            'products' => $products,
        ]);

        $response->getBody()->write($html);
        return $response;
    }


    public function create(Request $request, Response $response): Response
    {
        $html = $this->view->run('products.create', [
            'title' => 'Novo Produto',
        ]);

        $response->getBody()->write($html);
        return $response;
    }

    public function store(Request $request, Response $response): Response
    {
        $data = (array) $request->getParsedBody();

        $name  = trim($data['name'] ?? '');
        $price = (float) ($data['price'] ?? 0);

        if ($name === '' || $price <= 0) {
            return $response->withHeader('Location', '/products/create')->withStatus(302);
        }

        Product::create([
            'name'  => $name,
            'price' => $price,
        ]);

        return $response->withHeader('Location', '/products')->withStatus(302);
    }
}
