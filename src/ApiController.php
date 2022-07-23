<?php declare(strict_types=1);

namespace Afonso\Pitstops\Api;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

class ApiController
{
    public function getStrategy(ServerRequestInterface $request): ResponseInterface
    {
        return Response::json(['foo' => 'bar']);
    }
}
