<?php declare(strict_types=1);

namespace Afonso\Pitstops\Api;

use Afonso\Pitstops\Strategy;

class StrategyNormalizer
{
    public function __construct(
        protected StintNormalizer $stintNormalizer
    ) {}

    public function normalize(Strategy $strategy): array
    {
        return [
            'stints' => array_map([$this->stintNormalizer, 'normalize'], $strategy->stints),
        ];
    }
}
