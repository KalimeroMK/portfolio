<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $fillable = [
        'title',
        'description',
        'image',
    ];
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'blog_tag')->withTimestamps();
    }
}
