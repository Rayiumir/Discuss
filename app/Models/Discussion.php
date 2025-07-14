<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Discussion extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];
    protected static function booted(): void
    {
        static::created(function ($discussion) {
            $discussion->update(['slug' => $discussion->title]);
        });
    }

    public function setSlugAttribute($value): void
    {
        $this->attributes['slug'] = $this->id . '-' . Str::slug($value);
    }
    public function topic(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isPinned(): bool
    {
        return !is_null($this->pinned_at);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function post()
    {
        return $this->hasOne(Post::class)->whereNull('parent_id');
    }

    public function latestPost()
    {
        return $this->hasOne(Post::class)->latest();
    }

    public function participants()
    {
        return $this->hasManyThrough(User::class, Post::class, 'discussion_id', 'id', 'id', 'user_id');
    }

    public function scopeOrderByLastPost($query): void
    {
        $query->orderBy(
            Post::select('created_at')
                ->whereColumn('posts.discussion_id', 'discussions.id')
                ->latest()
                ->take(1),
            'desc'
        );
    }

    public function scopeOrderByPinned($query): void
    {
        $query->orderBy('pinned_at', 'asc');
    }

    public function replies()
    {
        return $this->hasMany(Post::class)->whereNotNull('parent_id');
    }
}
