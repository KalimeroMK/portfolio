<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contribution extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'url',
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'contribution_tag')->withTimestamps();
    }

}
