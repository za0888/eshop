<?php

namespace App\enums;

enum OrderStatus: string
{
    case Paid= 'paid';// mark as deleted  from stock main

    case Pending = 'pending';//stock main, not assigned to the menager

    case Processing = 'processing';//came to stock manager

    case Shipped = 'shipped';//remains in the stock manager

    case Canceled = 'canceled';//get back to the stock main
}
