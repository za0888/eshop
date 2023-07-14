<?php

namespace App\enums;

enum UserStatus:string

{
    case Administrator='administrator';
    case Operator='operator';
    case Guest='guest';
}

