<?php

namespace App\enums;

enum OrderStatus: string
{
    case Accepted = 'accepted';
    case Pending = 'pending';
    case Processed = 'processed';
    case Shipped = 'shipped';
    case Canceled = 'canceled';
}
