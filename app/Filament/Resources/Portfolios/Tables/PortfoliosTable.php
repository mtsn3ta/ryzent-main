<?php

namespace App\Filament\Resources\Portfolios\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PortfoliosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('thumbnail')
    ->label('Thumbnail')
    ->disk('public')
    ->square()
    ->size(80),

                TextColumn::make('title')
                    ->label('Proyek')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->since(),

            ])

            ->filters([

                SelectFilter::make('status')
                    ->options([
                        'Development' => 'Development',
                        'Active' => 'Active',
                        'Coming Soon' => 'Coming Soon',
                    ]),

                SelectFilter::make('category')
                    ->options([
                        'SaaS' => 'SaaS',
                        'Website Sekolah' => 'Website Sekolah',
                        'Website Olahraga' => 'Website Olahraga',
                        'AI Platform' => 'AI Platform',
                        'Custom Software' => 'Custom Software',
                    ]),

            ])

            ->recordActions([
                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}