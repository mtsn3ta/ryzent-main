<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Proyek')
                    ->schema([

                        TextInput::make('title')
    ->label('Nama Proyek')
    ->required()
    ->live(onBlur: true)
    ->afterStateUpdated(function ($state, $set) {
        $set('slug', Str::slug($state));
    }), 

                        TextInput::make('slug')
    ->required()
    ->unique(ignoreRecord: true),

                        Select::make('category')
                            ->options([
                                'SaaS' => 'SaaS',
                                'Website Sekolah' => 'Website Sekolah',
                                'Website Olahraga' => 'Website Olahraga',
                                'AI Platform' => 'AI Platform',
                                'Custom Software' => 'Custom Software',
                            ])
                            ->required(),

                        Select::make('status')
                            ->options([
                                'Development' => 'Development',
                                'Active' => 'Active',
                                'Coming Soon' => 'Coming Soon',
                            ])
                            ->default('Development')
                            ->required(),

                        Toggle::make('is_featured')
                            ->label('Featured Project'),

                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),

                Section::make('Media')
                    ->schema([

                        FileUpload::make('thumbnail')
    ->label('Thumbnail')
    ->image()
    ->disk('public')
    ->directory('portfolios/thumbnails'),

                        FileUpload::make('gallery_images')
    ->label('Gallery Screenshots')
    ->multiple()
    ->image()
    ->disk('public')
    ->directory('portfolios/gallery'),
                    ]),

                Section::make('Konten')
                    ->schema([

                        Textarea::make('excerpt')
                            ->label('Ringkasan')
                            ->rows(3)
                            ->columnSpanFull(),

                        RichEditor::make('content')
                            ->label('Deskripsi Lengkap')
                            ->columnSpanFull(),
                    ]),

                Section::make('Link')
                    ->schema([

                        TextInput::make('demo_url')
                            ->label('Demo URL')
                            ->url(),

                        TextInput::make('github_url')
                            ->label('GitHub URL')
                            ->url(),
                    ])
                    ->columns(2),
            ]);
    }
}