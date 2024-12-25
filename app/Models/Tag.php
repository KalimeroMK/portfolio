<?php

namespace App\Models;

use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    /** @use HasFactory<TagFactory> */

    use HasFactory;

    protected $table = 'tags';
    protected $fillable = [
        'name',
    ];

    /**
     * The experiences that belong to the tag.
     *
     * @return BelongsToMany<Tag, Experience>
     */
    public function experiences(): BelongsToMany
    {
        return $this->belongsToMany(Experience::class, 'experience_tag');
    }

    /**
     * The articles that belong to the tag.
     *
     * @return BelongsToMany<Tag, Article>
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_tag');
    }

    /**
     * @return BelongsToMany<Tag, Blog>
     */
    public function blogs(): BelongsToMany
    {
        return $this->belongsToMany(Blog::class);
    }

    /**
     * @return BelongsToMany<Tag,Contribution>
     */
    public function contributions(): BelongsToMany
    {
        return $this->belongsToMany(Contribution::class);
    }

}
