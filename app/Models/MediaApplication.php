<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaApplication extends Model
{
    use HasFactory;

    protected $table = 'media_applications';
    protected $fillable = [
        'application_id', 'type_id', 'name', 'url'
    ];

    /**
     * Get the application that owns the MediaApplication
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }

    /**
     * Get the type that owns the MediaApplication
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(MediaType::class, 'type_id', 'id');
    }
}
