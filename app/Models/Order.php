<?php

namespace App\Models;

use App\enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'status',
        'user_id',
        'number',
    ];

    protected $casts = [
        'status' => OrderStatus::class
    ];

    public function skus(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->as('ordered')
            ->withTimestamps()
            ->withPivot('number_of_ordered');

    }

// user customers, user manager
//order must have reolation to every manager who change it
//take it in account in update order
//
    public function user():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
