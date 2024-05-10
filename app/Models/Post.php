<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // public $appends = [
    //     'thumbnail_url',
    //     'human_readable_created_at'
    // ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id', 'id');
    }

    /**
     * Get all of the comment for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    // public function getThumbnailUrlAttribute() 
    // {
    //     return asset('storage/image/post/'. $this->thumbnail);
    // }
    
    // public function getHumanReadableCreatedAtAttribute() 
    // {
    //     return $this->created_at->diffForHumans();
    // }
}
