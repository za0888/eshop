<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MediaCollection extends Model
{
    use HasFactory;

protected $fillable=[
    'name',
    'sku_id',
];

    public function sku():BelongsTo
    {
        return $this->belongsTo(Product::class)
            ->withDefault();
    }

    public function media() :HasMany
    {
        return $this->hasMany(Media::class);
    }
}
