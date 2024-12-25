<?php

namespace App\Models;

use Database\Factories\ExperienceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Experience extends Model
{
    /** @use HasFactory<ExperienceFactory> */

    use HasFactory;

    protected $table = 'experiences';

    protected $fillable = [
        'company',
        'employment_type',
        'description',
        'image',
        'position',
        'start_date',
        'end_date',
    ];
    protected array $dates = [
        'start_date',
        'end_date'
    ];

    /**
     * The tags that belong to the experience.
     *
     * @return BelongsToMany<Tag>
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'experience_tag')->withTimestamps();
    }

    /**
     * @return string[]
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',

        ];
    }
}
