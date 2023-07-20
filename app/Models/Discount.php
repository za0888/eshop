<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discount extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'start',
        'end',
        'number'
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
