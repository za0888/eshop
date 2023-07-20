<?php

namespace App\enums;

enum UserState: string
{
    case Active = 'active';
    case Vocation = 'vocation';
    case IsIll = 'isill';
}
