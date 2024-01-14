<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'image', 'link', 'is_hidden'
    ];

    public function application(): HasMany
    {
        return $this->hasMany(Application::class, 'client_id', 'id');
    }
}
