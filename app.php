<?php declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

/* Dependencies */
$container = new \League\Container\Container();

$logger = new \Monolog\Logger('app');
$logger->pushHandler(new \Monolog\Handler\StreamHandler('php://stdout', \Monolog\Logger::DEBUG));

$container->add(\Psr\Log\LoggerInterface::class, $logger);
$container->add(\Afonso\Pitstops\Api\TyreTypeNormalizer::class);
$container->add(\Afonso\Pitstops\Api\TyreSetNormalizer::class)->addArgument(\Afonso\Pitstops\Api\TyreTypeNormalizer::class);
$container->add(\Afonso\Pitstops\Api\StintNormalizer::class)->addArgument(\Afonso\Pitstops\Api\TyreSetNormalizer::class);
$container->add(\Afonso\Pitstops\Api\StrategyNormalizer::class)->addArgument(\Afonso\Pitstops\Api\StintNormalizer::class);
$container->add(\Afonso\Pitstops\Api\ApiController::class)->addArgument(\Afonso\Pitstops\Api\StrategyNormalizer::class);
/**/

/* Routes */
$strategy = new \League\Route\Strategy\ApplicationStrategy();
$strategy->setContainer($container);

$router = new \League\Route\Router();
$router->setStrategy($strategy);

$router->get('/v1/strategies', [\Afonso\Pitstops\Api\ApiController::class, 'getStrategy']);
/**/

$handler = new \Afonso\Pitstops\Api\RequestHandler($router, $logger);

$http = new \React\Http\HttpServer([$handler, 'handle']);

$socket = new \React\Socket\SocketServer('127.0.0.1:8080');
$http->listen($socket);

$logger->info("Server running at http://127.0.0.1:8080");
