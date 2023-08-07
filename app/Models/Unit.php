<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function skus(): HasMany
    {
        return $this->hasMany(Sku::class);
    }

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }
}