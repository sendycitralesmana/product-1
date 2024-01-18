<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable = [
      'product_id', 'name', 'price', 'long', 'weight', 'width', 'height',   
    ];

    /**
     * Get all of the spec for the ProductVariant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spec(): HasMany
    {
        return $this->hasMany(PVSpecification::class, 'product_variant_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
