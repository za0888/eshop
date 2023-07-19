<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function manager() : BelongsTo
    {
        return $this->belongsTo(Manager::class)->withDefault();
    }

    //    stoc if not main is a virtual stock for products

    public function stock() : MorphMany
    {
        return $this->morphMany(Product::class,'stockable');
    }
}
