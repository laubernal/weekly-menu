<?php

use Ramsey\Uuid\Uuid;

class Id extends ValueObject
{
    private $_value;

    public function __construct(string $value)
    {
        if ($this->validate($value)) {
            throw new Exception('Incorrect ID format');
        }

        $this->_value = $value;
    }

    public static function generate(): Id
    {
        return new Id(Uuid::uuid4()->toString());
    }

    protected function validate(mixed $value): bool
    {
        return !Uuid::isValid($value);
    }

    public function value(): string
    {
        return $this->_value;
    }
}
