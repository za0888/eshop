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
    protected $dateFormat = 'U';

    protected $casts = [
        'start' => 'date',
        'end' => 'date',
        'status' => PriceStatus::class,
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)->withDefault();
    }
}
