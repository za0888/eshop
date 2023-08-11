<?php

namespace App\enums;

enum UserStatus:string

{
    case Administrator='administrator';
    case Manager='manager';
    case Customer='customer';

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string
    {
        return match ($this) {
            static::Administrator => 'Administrator',
            static::Manager => 'Manager',
            static::Customer => 'Customer',
        };
    }
}

