<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'ammount',
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

   /* public function user()
    {
        return $this->morphOne(User::class, 'stockable');
    }*/



    /* public function stockable(): MorphTo
     {
         return $this->morphTo();
     }*/
}
