<?php declare(strict_types=1);

namespace Afonso\Pitstops\Api;

use Afonso\Pitstops\TyreType;

class TyreTypeNormalizer
{
    public function normalize(TyreType $tyreType): array
    {
        return [
            'name' => $tyreType->name,
        ];
    }
}
