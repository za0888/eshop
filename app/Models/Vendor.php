<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable=[
       'name',
       'account',
       'address',
       'country',
       'email' ,

    ] ;

    public function skus():HasMany
    {
        return  $this->hasMany(Sku::class);
    }
}
