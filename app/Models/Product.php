<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'number_in_stock',
        'properties',
        'order_id',
        'stock_id',
        'category_id',
    ];

    protected $with = ['price'];

    protected $casts = [
        'propertis' => 'array'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
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

    public function Media(): HasMany
    {
        return $this->hasMany(Media::class);
    }


}
