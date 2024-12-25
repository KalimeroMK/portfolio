<?php

namespace App\Models;

use Database\Factories\BlogFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Blog extends Model
{
    /** @use HasFactory<BlogFactory> */

    use HasFactory;

    protected $table = 'articles';
    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    /**
     * The tags that belong to the blog.
     *
     * @return BelongsToMany<Blog, Tag>
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'blog_tag')->withTimestamps();
    }
}
