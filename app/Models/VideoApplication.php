<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideoApplication extends Model
{
    use HasFactory;

    protected $table = 'video_applications';
    protected $fillable = [
        'application_id', 'url'
    ];

    /**
     * Get the application that owns the VideoApplication
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }
}
