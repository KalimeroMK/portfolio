<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Ensure publish is boolean
        if (isset($data['publish'])) {
            $data['publish'] = (bool) $data['publish'];
        } else {
            $data['publish'] = false;
        }

        // Convert image array to string if needed
        if (isset($data['image']) && is_array($data['image']) && !empty($data['image'])) {
            $data['image'] = $data['image'][0] ?? null;
        }

        return $data;
    }
}
