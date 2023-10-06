<?php

namespace App\enums;

enum UserStatus:string

{
    case Administrator='administrator';
    case Boss='boss';
    case Manager='manager';
    case Customer='customer';
}
