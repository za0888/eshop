<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
      'name',
      'price',
      'ammount',
      'properties',
    ];

    protected $casts=[
        'propertis'=>'array'
    ];

    public function order() : BelongsTo
    {
        return $this->belongsTo(Order::class)->withDefault();
    }

    public function prices() : HasMany
    {
        return $this->hasMany(Price::class);

    }
}
