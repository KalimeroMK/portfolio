<?php

namespace App\Models;

use App\Enums\ContributionType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contribution extends Model
{
    protected $table = 'contributions';

    protected $fillable = [
        'title',
        'type',
        'description',
        'image',
        'url',
    ];

    protected $casts = [
        'type' => ContributionType::class,
    ];

    /**
     * Scope the query to contributions made to projects maintained by others.
     *
     * @param  Builder<Contribution>  $query
     * @return Builder<Contribution>
     */
    public function scopeUpstream(Builder $query): Builder
    {
        return $query->where('type', ContributionType::Upstream);
    }

    /**
     * Scope the query to packages and projects of my own.
     *
     * @param  Builder<Contribution>  $query
     * @return Builder<Contribution>
     */
    public function scopePackages(Builder $query): Builder
    {
        return $query->where('type', ContributionType::Package);
    }

    /**
     * The tags that belong to the contribution.
     *
     * @return BelongsToMany<Tag>
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
