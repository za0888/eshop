<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sku extends Model
{
    use HasFactory;

    protected $fillable = [
        'skucode',
        'barcode',
        'price',
        'locationInStock',
        'numberInStock',
        'stock_id',
        'product_id',
    ];

    protected $with=[
        'stock:id,name',
        'vendor:id,name',
        'package:id,name',
        'unit:id,name'
    ];

    public function vendor():BelongsTo
    {
        return $this->belongsTo(Vendor::class)
            ->withDefault();
    }

    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discount::class)
            ->withTimestamps();
}

    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class)
            ->withDefault();
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)
            ->withDefault();
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class)
            ->withDefault();
    }

    public function unit():BelongsTo
    {
        return $this->belongsTo(Unit::class)
            ->withDefault();
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function attributeOptions():BelongsToMany
    {
        return  $this->belongsToMany(AttributeOption::class)->withTimestamps();
    }
}
