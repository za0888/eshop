<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $with=['user'];

    public function manager() : HasOne
    {
        return $this->hasOne(Manager::class);
    }

    public function products() :HasMany
    {
        return $this->hasMany(Product::class);
    }



    //    stock if not main is a virtual stock for products
/*
    public function stock() : MorphMany
    {
        return $this->morphMany(Product::class,'stockable');
    }*/
}
