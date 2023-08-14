<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'value',
        'unit_id',
    ];

    public function skus():HasMany
    {
        return $this->hasMany(Sku::class);
    }

    public function unit():BelongsTo
    {
        return $this->belongsTo(Unit::class)
            ->withDefault();
    }
}
