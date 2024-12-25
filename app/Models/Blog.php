<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * @template TFactory of Factory
 * @extends Model<TFactory>
 */
class Blog extends Model
{
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
