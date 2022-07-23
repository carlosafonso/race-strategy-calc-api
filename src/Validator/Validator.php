<?php declare(strict_types=1);

namespace Afonso\Pitstops\Api\Validator;

use Afonso\Pitstops\Api\Validator\Criteria;
use Ds\Map;

class Validator
{
    /**
     * @var \Ds\Map
     */
    protected $criteria;

    public function __construct() {
        $this->criteria = new Map();
    }

    public function addCriteria(Criteria $criteria): static
    {
        // $this->criteria[] = $criteria;
        $this->criteria->put($criteria->getAttributeName(), $criteria);
        return $this;
    }

    public function validate(array $data): void
    {
        foreach ($data as $key => $value) {
            // return null;
        }
    }
}
