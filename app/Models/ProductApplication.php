<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductApplication extends Model
{
    use HasFactory;
    protected $table = "product_applications";
    protected $fillable = [
        "product_id", "application_id"
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }
}
