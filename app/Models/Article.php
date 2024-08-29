<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        'author',
        'thumbnail',
        'title',
        'slug',
        'body',
        'teaser',
        'meta_title',
        'meta_description',
    ];

    // Relasi ke user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'name');
    }
}
