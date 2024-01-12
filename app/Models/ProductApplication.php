<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductApplication extends Model
{
    use HasFactory;
    protected $table = "product_applications";
    protected $fillable = [
        "product_id", "application_id"
    ];
}
