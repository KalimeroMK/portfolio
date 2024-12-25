<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contribution extends Model
{
    protected $table = 'contributions';

    protected $fillable = [
        'title',
        'description',
        'image',
        'url',
    ];

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
