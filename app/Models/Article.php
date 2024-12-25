<?php

namespace App\Models;

use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    /** @use HasFactory<ArticleFactory> */

    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'description',
        'image',
        'publish',
        'slug',
    ];

    /**
     * The tags that belong to the article.
     *
     * @return BelongsToMany<Article, Tag>
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
