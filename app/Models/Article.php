<?php

namespace App\Models;

use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

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
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'indexable',
        'structured_data',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'publish' => 'boolean',
            'indexable' => 'boolean',
        ];
    }

    /**
     * The tags that belong to the article.
     *
     * @return BelongsToMany<Article, Tag>
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get SEO-friendly meta title
     */
    public function getMetaTitle(): string
    {
        return $this->meta_title ?: $this->title;
    }

    /**
     * Get SEO-friendly meta description
     */
    public function getMetaDescription(): string
    {
        return $this->meta_description ?: Str::limit(strip_tags($this->description), 155);
    }

    /**
     * Get OG image
     */
    public function getOgImage(): ?string
    {
        return $this->og_image ?: $this->image;
    }

    /**
     * Generate structured data for article
     */
    public function getStructuredData(): array
    {
        if ($this->structured_data) {
            return json_decode($this->structured_data, true);
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $this->title,
            'description' => $this->getMetaDescription(),
            'image' => $this->getOgImage() ? asset($this->getOgImage()) : null,
            'datePublished' => $this->created_at?->toIso8601String(),
            'dateModified' => $this->updated_at?->toIso8601String(),
            'author' => [
                '@type' => 'Person',
                'name' => 'Zoran Bogoevski',
                'url' => 'https://zorandev.info',
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Zoran Dev',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('images/logo.png'),
                ],
            ],
        ];
    }

    /**
     * Scope for published and indexable articles
     */
    public function scopePublished($query)
    {
        return $query->where('publish', true);
    }

    /**
     * Scope for indexable articles
     */
    public function scopeIndexable($query)
    {
        return $query->where('indexable', true);
    }
}
