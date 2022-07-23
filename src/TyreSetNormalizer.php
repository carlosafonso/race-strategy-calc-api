<?php declare(strict_types=1);

namespace Afonso\Pitstops\Api;

use Afonso\Pitstops\TyreSet;

class TyreSetNormalizer
{
    public function __construct(
        protected TyreTypeNormalizer $tyreTypeNormalizer
    ) {}

    public function normalize(TyreSet $tyreSet): array
    {
        return [
            'tyreType' => $this->tyreTypeNormalizer->normalize($tyreSet->type),
        ];
    }
}
