<?php

namespace App\Models;

use App\enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $with=['products'];

    protected $casts=[
        'status'=>OrderStatus::class
    ];

    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }
}
