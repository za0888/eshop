<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttributeOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'numericValue',
        'attribute_id',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['attribute'];

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class)
            ->withDefault();
    }

    public function skus(): BelongsToMany
    {
//        intermediate table must have created_at and updated_at timestamps that are automatically maintained by Eloquent,
        return $this->belongsToMany(Sku::class)
            ->withTimestamps();
    }


}
