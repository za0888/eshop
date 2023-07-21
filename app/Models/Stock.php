<?php

namespace App\Models;

use App\enums\StockStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];

    protected $casts = ['status' => StockStatus::class];

    protected $with = ['user'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function products(): HasMany
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
