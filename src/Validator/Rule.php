<?php declare(strict_types=1);

namespace Afonso\Pitstops\Api\Validator;

interface Rule
{
    public function isValid(mixed $data): bool;
}
