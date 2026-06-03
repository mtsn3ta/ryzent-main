<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ContactInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextEntry::make('name')
                    ->label('Nama'),

                TextEntry::make('email'),

                TextEntry::make('phone')
                    ->label('WhatsApp'),

                TextEntry::make('status')
                    ->badge(),

                TextEntry::make('subject'),

                TextEntry::make('message')
                    ->columnSpanFull(),

                TextEntry::make('created_at')
                    ->label('Tanggal Masuk')
                    ->dateTime(),

            ]);
    }
}
