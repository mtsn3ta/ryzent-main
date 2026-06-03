<?php

namespace App\Filament\Widgets;

use App\Models\Portfolio;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentPortfolio extends TableWidget
{
    protected static ?string $heading = 'Recent Portfolio';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 5;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn (): Builder => Portfolio::query()->latest()
            )

            ->columns([

                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Project')
                    ->searchable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('category')
                    ->badge(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Completed' => 'success',
                        'On Going' => 'warning',
                        'Maintenance' => 'info',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
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
