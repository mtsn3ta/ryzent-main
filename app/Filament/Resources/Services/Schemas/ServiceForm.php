<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Layanan')
                    ->schema([

                        TextInput::make('title')
                            ->label('Nama Layanan')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn ($state, $set) =>
                                $set('slug', Str::slug($state))
                            ),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),

                        TextInput::make('icon')
                            ->label('Icon Heroicon')
                            ->placeholder('heroicon-o-globe-alt'),

                        Toggle::make('is_featured')
                            ->label('Featured Service'),

                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),

                Section::make('Harga')
                    ->schema([

                        TextInput::make('price_start')
                            ->label('Harga Mulai')
                            ->numeric()
                            ->prefix('Rp'),
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
            ]);
    }
}