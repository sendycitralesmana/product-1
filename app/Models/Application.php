<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'name', 'area', 'time'
    ];

    /**
     * The roles that belong to the Application
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_applications', 'application_id', 'product_id');
    }
}
