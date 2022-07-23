<?php declare(strict_types=1);

namespace Afonso\Pitstops\Api;

use Throwable;
use League\Route\Router;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use React\Http\Message\Response;

class RequestHandler
{
    public function __construct(
        protected Router $router,
        protected LoggerInterface $logger
    ) {}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            return $this->router->dispatch($request);
        } catch (Throwable $e) {
            $this->logger->error($e->getMessage());
            $this->logger->error($e->getTraceAsString());
            return Response::plaintext("Error occurred: " . $e->getMessage());
        }
    }
}
