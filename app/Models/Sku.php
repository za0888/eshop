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
        'stock_id',
        'product_id',
        'unit_id',
    ];

    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discount::class);
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

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class)
            ->withDefault();
    }

    public function media()
    {
        return $this->hasMany(MediaCollection::class);
    }

}
