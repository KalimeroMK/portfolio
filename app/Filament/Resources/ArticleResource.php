<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use BackedEnum;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $slug = 'articles';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Content')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->required()
                            ->unique(Article::class, 'slug', ignoreRecord: true)
                            ->prefix('zorandev.info/articles/'),
                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('images/articles')
                            ->required()
                            ->helperText('Recommended: 1200x630px for optimal social sharing'),
                        RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Select::make('tags')
                            ->multiple()
                            ->relationship('tags', 'name')
                            ->preload(),
                    ])
                    ->columnSpanFull(),
                
                Section::make('SEO Settings')
                    ->icon('heroicon-o-magnifying-glass')
                    ->schema([
                        Section::make('Meta Information')
                            ->description('Optimize for search engines')
                            ->schema([
                                TextInput::make('meta_title')
                                    ->label('Meta Title')
                                    ->placeholder('Leave empty to use article title')
                                    ->maxLength(60)
                                    ->helperText(fn (?string $state): string => 'Length: ' . strlen($state ?? '') . '/60 characters. Optimal: 50-60 chars.'),
                                
                                Textarea::make('meta_description')
                                    ->label('Meta Description')
                                    ->placeholder('Leave empty to auto-generate from description')
                                    ->rows(3)
                                    ->maxLength(160)
                                    ->helperText(fn (?string $state): string => 'Length: ' . strlen($state ?? '') . '/160 characters. Optimal: 150-160 chars.'),
                                
                                TextInput::make('meta_keywords')
                                    ->label('Meta Keywords')
                                    ->placeholder('e.g., laravel, php, web development')
                                    ->helperText('Comma-separated keywords (optional)'),
                            ]),
                        
                        Section::make('Open Graph / Social')
                            ->description('How this appears when shared on social media')
                            ->schema([
                                FileUpload::make('og_image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/articles/og')
                                    ->label('Social Share Image')
                                    ->helperText('Recommended: 1200x630px. If empty, main image will be used.'),
                            ]),
                        
                        Section::make('Advanced')
                            ->schema([
                                Checkbox::make('indexable')
                                    ->label('Allow search engines to index')
                                    ->default(true)
                                    ->helperText('Uncheck to add noindex tag (for private/draft content)'),
                                
                                Textarea::make('structured_data')
                                    ->label('Custom Structured Data (JSON-LD)')
                                    ->rows(5)
                                    ->placeholder('{"@context": "https://schema.org", ...}')
                                    ->helperText('Advanced: Custom JSON-LD structured data. Leave empty for auto-generated Article schema.'),
                            ]),
                    ])
                    ->columnSpanFull(),
                
                Section::make('Publishing')
                    ->schema([
                        Checkbox::make('publish')
                            ->label('Published')
                            ->default(false),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                ImageColumn::make('image')
                    ->circular(),

                IconColumn::make('publish')
                    ->boolean()
                    ->label('Published'),

                IconColumn::make('indexable')
                    ->boolean()
                    ->label('Indexable'),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'meta_description'];
    }
}
