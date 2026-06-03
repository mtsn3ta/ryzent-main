<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentArticles extends TableWidget
{
    protected static ?string $heading = 'Recent Articles';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 7;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn (): Builder => Post::query()->latest()
            )

            ->columns([

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(60),

                Tables\Columns\TextColumn::make('slug')
                    ->limit(30)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dipublikasikan')
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
