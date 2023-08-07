<?php

namespace App\Models;

use App\enums\PriceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'start',
        'end',
        'status',
        'value',
        'sku_id',
        'price_id'
    ];

    protected $casts = [
        'start' => 'date',
        'end' => 'date',
        'status' => PriceStatus::class,
    ];

    public function sku(): BelongsTo
    {
        return $this->belongsTo(Product::class)->withDefault();
    }

    public function  unit(): BelongsTo
    {
        return  $this->belongsTo(Unit::class);
    }
}
