<?php

declare(strict_types=1);

namespace App\Enums;

enum ContributionType: string
{
    case Package = 'package';
    case Upstream = 'upstream';

    public function label(): string
    {
        return match ($this) {
            self::Package => 'Own package',
            self::Upstream => 'Upstream contribution',
        };
    }
}
