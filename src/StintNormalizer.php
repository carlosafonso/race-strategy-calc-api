<?php declare(strict_types=1);

namespace Afonso\Pitstops\Api;

use Afonso\Pitstops\Stint;

class StintNormalizer
{
    public function __construct(
        protected TyreSetNormalizer $tyreSetNormalizer
    ) {}

    public function normalize(Stint $stint): array
    {
        return [
            'startLap' => $stint->startLap,
            'tyreSet' => $this->tyreSetNormalizer->normalize($stint->tyreSet),
        ];
    }
}
