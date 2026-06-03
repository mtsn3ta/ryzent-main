<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentLeads extends TableWidget
{
    protected static ?string $heading = 'Recent Leads';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn (): Builder => Contact::query()->latest()
            )

            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),

                Tables\Columns\TextColumn::make('phone')
                    ->label('WhatsApp'),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'New' => 'info',
                        'Contacted' => 'warning',
                        'Negotiation' => 'gray',
                        'Won' => 'success',
                        'Lost' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\IconColumn::make('is_read')
                    ->label('Dibaca')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Masuk')
                    ->since(),

            ])

            ->filters([
                //
            ])

            ->headerActions([
                //
            ])

            ->recordActions([
                //
            ])

            ->toolbarActions([
                //
            ]);
    }
}
