<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
{
    return $schema
        ->components([

            Section::make('General')
                ->schema([

                    TextInput::make('site_name')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('tagline')
                        ->maxLength(255),

                    FileUpload::make('logo')
                        ->image()
                        ->directory('settings')
                        ->disk('public'),

                    FileUpload::make('favicon')
                        ->image()
                        ->directory('settings')
                        ->disk('public'),

                ])
                ->columns(2),

            Section::make('Contact')
                ->schema([

                    TextInput::make('email')
                        ->email(),

                    TextInput::make('phone')
                        ->tel(),

                    TextInput::make('whatsapp')
                        ->helperText('Format: 628xxxxxxxxxx'),

                    Textarea::make('address')
                        ->rows(3)
                        ->columnSpanFull(),

                    Textarea::make('google_maps')
                        ->rows(3)
                        ->columnSpanFull(),

                ])
                ->columns(3),

            Section::make('Social Media')
                ->schema([

                    TextInput::make('instagram')
                        ->url(),

                    TextInput::make('facebook')
                        ->url(),

                    TextInput::make('linkedin')
                        ->url(),

                    TextInput::make('github')
                        ->url(),

                    TextInput::make('youtube')
                        ->url(),

                    TextInput::make('tiktok')
                        ->url(),

                ])
                ->columns(2),

            Section::make('SEO')
                ->schema([

                    TextInput::make('meta_title'),

                    Textarea::make('meta_description')
                        ->rows(4)
                        ->columnSpanFull(),

                    FileUpload::make('og_image')
                        ->image()
                        ->directory('settings')
                        ->disk('public'),

                ])
                ->columns(2),

        ]);
}
}
