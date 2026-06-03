<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class NeedFollowUp extends TableWidget
{
    protected static ?string $heading = '⚠ Need Follow Up';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn (): Builder => Contact::query()
                    ->whereIn('status', [
                        'Contacted',
                        'Negotiation',
                    ])
                    ->latest()
            )

            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('WhatsApp'),

                Tables\Columns\TextColumn::make('subject')
                    ->label('Kebutuhan')
                    ->limit(40),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Contacted' => 'warning',
                        'Negotiation' => 'info',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Masuk')
                    ->since(),

            ]);
    }
}
