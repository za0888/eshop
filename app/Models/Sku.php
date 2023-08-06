<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sku extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'barcode',
        'stock_id',
        'product_id',
    ];

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
}
