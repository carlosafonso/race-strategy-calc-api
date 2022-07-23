<?php declare(strict_types=1);

namespace Afonso\Pitstops\Api\Validator;

class NotNull implements Rule
{
    public function isValid(mixed $data): bool
    {
        return $data !== null;
    }
}
