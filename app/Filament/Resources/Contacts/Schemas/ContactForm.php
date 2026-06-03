<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Kontak')
                    ->schema([

                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required(),

                        TextInput::make('phone')
                            ->label('No. WhatsApp')
                            ->tel(),

                    ])
                    ->columns(2),

                Section::make('Pesan')
                    ->schema([

                        TextInput::make('subject')
                            ->label('Subjek')
                            ->maxLength(255),

                        Textarea::make('message')
                            ->label('Pesan')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),

                    ]),

                Section::make('Status')
    ->schema([

        Select::make('status')
            ->options([
                'New' => 'New',
                'Contacted' => 'Contacted',
                'Negotiation' => 'Negotiation',
                'Won' => 'Won',
                'Lost' => 'Lost',
            ])
            ->default('New')
            ->required(),

        Toggle::make('is_read')
            ->label('Sudah Dibaca')
            ->default(false),

    ])
    ->columns(2),
            ]);
    }
}
