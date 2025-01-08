<?php

namespace App\Models;

use Database\Factories\CertificationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certification extends Model
{
    /** @use HasFactory<CertificationFactory> */

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * @return BelongsTo<User,Certification>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
