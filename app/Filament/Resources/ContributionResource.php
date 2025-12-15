<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContributionResource\Pages;
use App\Models\Contribution;
use App\Models\Tag;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use BackedEnum;

class ContributionResource extends Resource
{
    protected static ?string $model = Contribution::class;

    protected static ?string $slug = 'contributions';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('url')
                    ->required(),
                FileUpload::make('image')
                    ->required(),
                RichEditor::make('description')
                    ->required()->columnSpanFull()
                    ->nullable(),
                Select::make('tag_id')
                    ->multiple()
                    ->relationship('tags')
                    ->options(Tag::pluck('name', 'id'))
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('url'),
                TextColumn::make('description')
                    ->limit(50),
                ImageColumn::make('image'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContributions::route('/'),
            'create' => Pages\CreateContribution::route('/create'),
            'edit' => Pages\EditContribution::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
