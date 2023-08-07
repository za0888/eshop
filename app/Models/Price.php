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
        'number',
        'product_id'
    ];

    protected $casts = [
        'value',
        'start' => 'date',
        'end' => 'date',
        'status' => PriceStatus::class,
    ];

    public function skus(): BelongsTo
    {
        return $this->belongsTo(Product::class)->withDefault();
    }
}
