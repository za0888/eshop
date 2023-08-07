<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class Discount extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'state',
        'name',
        'start',
        'end',
        'percent',
        'sku_id'
    ];

    protected $casts=[
        'start'=>'date',
        'end'=>'date',

    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class)->withDefault();
    }
}
