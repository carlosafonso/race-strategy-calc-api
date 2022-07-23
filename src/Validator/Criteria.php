<?php declare(strict_types=1);

namespace Afonso\Pitstops\Api\Validator;

class Criteria
{
    /**
     * @var \Afonso\Pitstops\Validator\Rule[]
     */
    protected $rules = [];

    public function __construct(protected string $attributeName) {}

    public function getAttributeName(): string
    {
        return $this->attributeName;
    }

    public function addRule(Rule $rule): static
    {
        $this->rules[] = $rule;
        return $this;
    }
}
