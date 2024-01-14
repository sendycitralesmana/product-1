<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function media(): HasMany
    {
        return $this->hasMany(MediaProduct::class, 'product_id', 'id');
    }
    
    public function variant(): HasMany
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }

    public function video(): HasMany
    {
        return $this->hasMany(ProductVideo::class, 'product_id', 'id');
    }

    public function application(): BelongsToMany
    {
        return $this->belongsToMany(Application::class, 'product_applications', 'product_id', 'application_id');
    }
}
