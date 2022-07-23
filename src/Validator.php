<?php declare(strict_types=1);

namespace Afonso\Pitstops\Validator;

interface ValidatorInterface
{
    public function validate(array $data): void;
}
