<?php

use ValueObject;

class Name extends ValueObject
{
    private $_value;

    public function __construct(string $value)
    {
        if ($this->validate($value)) {
            throw new Error('Incorrect name format');
        }

        $this->_value = $value;
    }

    protected function validate(mixed $value): bool
    {
        return !$value->is_string();
    }

    public function value(): string
    {
        return $this->_value;
    }
}
