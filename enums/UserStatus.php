<?php

namespace App\enums;

enum UserStatus:string

{
    case Administrator='administrator';
    case Manager='manager';
    case Customer='customer';
}
