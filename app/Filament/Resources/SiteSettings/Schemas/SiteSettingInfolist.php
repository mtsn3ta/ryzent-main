<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SiteSettingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('site_name')
                    ->placeholder('-'),
                TextEntry::make('tagline')
                    ->placeholder('-'),
                TextEntry::make('logo')
                    ->placeholder('-'),
                TextEntry::make('favicon')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('phone')
                    ->placeholder('-'),
                TextEntry::make('whatsapp')
                    ->placeholder('-'),
                TextEntry::make('address')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('google_maps')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('instagram')
                    ->placeholder('-'),
                TextEntry::make('facebook')
                    ->placeholder('-'),
                TextEntry::make('linkedin')
                    ->placeholder('-'),
                TextEntry::make('github')
                    ->placeholder('-'),
                TextEntry::make('youtube')
                    ->placeholder('-'),
                TextEntry::make('tiktok')
                    ->placeholder('-'),
                TextEntry::make('meta_title')
                    ->placeholder('-'),
                TextEntry::make('meta_description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                ImageEntry::make('og_image')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
