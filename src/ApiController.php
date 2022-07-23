<?php declare(strict_types=1);

namespace Afonso\Pitstops\Api;

use Afonso\Pitstops\Api\Validator\Criteria;
use Afonso\Pitstops\Api\Validator\NotNull;
use Afonso\Pitstops\Api\Validator\Validator;
use Afonso\Pitstops\StrategySolver;
use Afonso\Pitstops\TyreSet;
use Afonso\Pitstops\TyreType;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

class ApiController
{
    public function __construct(
        protected StrategyNormalizer $strategyNormalizer
    ) {}

    public function getStrategy(ServerRequestInterface $request): ResponseInterface
    {
        $validator = (new Validator())
            ->addCriteria(
                (new Criteria('foo'))->addRule(new NotNull())
            );
        $validator->validate($request->getQueryParams());

        $soft = new TyreType('soft', 0, 5);
        $medium = new TyreType('medium', 1000, 2);
        $tyreSets = [
            new TyreSet($soft),
            new TyreSet($soft),
            new TyreSet($medium),
        ];
        $solver = new StrategySolver();
        $strategy = $solver->findBestStrategy(50, 80000, 15000, $tyreSets, 2);

        $response = new Response();
        $response->getBody()->write(json_encode($this->strategyNormalizer->normalize($strategy)));
        return $response
            ->withStatus(200)
            ->withHeader('Content-Type', 'application/json');
    }
}
