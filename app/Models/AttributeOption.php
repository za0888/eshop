<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttributeOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'capacity',
        'attribute_id',
    ];


    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class)->withDefault();
    }
}
