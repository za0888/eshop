<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'state',
        'name',
        'start',
        'end',

    ];

    protected $casts = [
        'start' => 'date',
        'end' => 'date',

    ];

    public function skus():BelongsToMany
    {
        return $this->belongsToMany(Sku::class)->withTimestamps();
    }

}
