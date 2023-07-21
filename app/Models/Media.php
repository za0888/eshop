<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'path',
        'nameOriginal',
        'size',
        'hashFile',
        'fileExtension',
        'product_id'
    ];
    public function product() :BelongsTo
    {
        return $this->belongsTo(Product::class)->withDefault();
    }
}
