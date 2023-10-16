<?php

namespace App\enums;

enum SkuStatus: string
{
    case Ready = 'ready';//ready to be sold
    case Ordered = 'ordered';
    case Archiv='archiv';// after been sold
    case Faulty='faulty'; //неисправен
}
