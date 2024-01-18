<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Get all of the specV for the Specification
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specV(): HasMany
    {
        return $this->hasMany(PVSpecification::class, 'specification_id', 'id');
    }
}
