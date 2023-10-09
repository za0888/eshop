<?php

namespace App\enums;

enum SkuStatus: string
{
    case ProductProcessing='product processing in stock';
    case Ready = 'ready';//ready to be sold
    case Ordered = 'ordered';
    case Shipped ='shipped';
    case Archiv='archiv';// after been sold
    case Faulty='faulty'; //неисправен
}
