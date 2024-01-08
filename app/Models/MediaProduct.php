<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'type_id', 'name', 'url'
    ];

    /**
     * Get the product that owns the MediaProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * Get the mediaType that owns the MediaProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mediaType(): BelongsTo
    {
        return $this->belongsTo(MediaType::class, 'type_id', 'id');
    }
}
