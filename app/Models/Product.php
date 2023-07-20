<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'amount',
        'properties',
    ];

    protected $with=['price'];

    protected $casts = [
        'propertis' => 'array'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class)->withDefault();
    }

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);

    }

    public function stock()
    {
        return $this->belongsTo(Stock::class)->withDefault();
    }

    public function discounts(): HasMany
    {
        return $this->hasMany(Discount::class);
    }


}
