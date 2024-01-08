<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PVSpecification extends Model
{
    use HasFactory;
    protected $table = 'product_variant_specifications';
    protected $fillable = [
        'product_variant_id', 'specification_id', 'value'
    ];

    /**
     * Get the product that owns the PVSpecification
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id', 'id');
    }

    /**
     * Get the specification that owns the PVSpecification
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specification(): BelongsTo
    {
        return $this->belongsTo(Specification::class, 'specification_id', 'id');
    }
}
