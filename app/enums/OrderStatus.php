<?php

namespace App\enums;

enum OrderStatus: string
{
    case Accepted = 'accepted';
    case Paid= 'paid';
    case Pending = 'pending';
    case Processed = 'processed';
    case Shipped = 'shipped';
    case Canceled = 'canceled';
}
