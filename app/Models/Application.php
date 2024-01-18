<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'name', 'area', 'time', 'thumbnail'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function media(): HasMany
    {
        return $this->hasMany(MediaApplication::class, 'application_id', 'id');
    }
    
    public function video(): HasMany
    {
        return $this->hasMany(VideoApplication::class, 'application_id', 'id');
    }

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_applications', 'application_id', 'product_id');
    }

    public function applicationPivot(): HasMany
    {
        return $this->hasMany(ProductApplication::class, 'application_id', 'id');
    }
}
