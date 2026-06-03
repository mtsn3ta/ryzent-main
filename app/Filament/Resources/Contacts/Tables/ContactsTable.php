<?php

namespace App\Filament\Resources\Contacts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\ViewAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;

class ContactsTable
{
    public static function configure(Table $table): Table
{
    return $table

        ->headerActions([
            ExportAction::make()
                ->label('Export Leads'),
        ])
            ->columns([

    TextColumn::make('name')
        ->label('Nama')
        ->searchable()
        ->sortable(),

    TextColumn::make('email')
        ->label('Email')
        ->searchable(),

    TextColumn::make('phone')
        ->label('WhatsApp')
        ->searchable(),

    TextColumn::make('status')
    ->badge()
    ->color(fn (string $state): string => match ($state) {
        'New' => 'gray',
        'Contacted' => 'warning',
        'Negotiation' => 'info',
        'Won' => 'success',
        'Lost' => 'danger',
        default => 'gray',
    }),

    IconColumn::make('is_read')
        ->label('Dibaca')
        ->boolean(),

    TextColumn::make('created_at')
        ->label('Masuk')
        ->since()
        ->sortable(),

])

            ->filters([

    TernaryFilter::make('is_read')
        ->label('Status Dibaca'),

    SelectFilter::make('status')
        ->options([
            'New' => 'New',
            'Contacted' => 'Contacted',
            'Negotiation' => 'Negotiation',
            'Won' => 'Won',
            'Lost' => 'Lost',
        ]),

])

            ->recordActions([
                ViewAction::make()
    ->slideOver(),
    ActionGroup::make([

        Action::make('whatsapp')
            ->label('WhatsApp')
            ->visible(fn ($record) => $record->status !== 'Lost')
            ->icon('heroicon-o-chat-bubble-left-right')
            ->color('success')
            ->url(function ($record) {

                $phone = preg_replace('/[^0-9]/', '', $record->phone);

                if (str_starts_with($phone, '0')) {
                    $phone = '62' . substr($phone, 1);
                }

                $message = urlencode(
                    "Halo {$record->name},\n\n" .
                    "Terima kasih telah menghubungi Ryzent.\n" .
                    "Kami ingin menindaklanjuti kebutuhan Anda terkait:\n" .
                    ($record->subject ?: 'Layanan Digital') .
                    "\n\nSalam,\nRyzent Cipta Digital"
                );

                return "https://wa.me/{$phone}?text={$message}";
            })
            ->openUrlInNewTab(),

        Action::make('negotiation')
    ->label('Negotiation')
    ->icon('heroicon-o-chat-bubble-left-right')
    ->color('warning')
    ->visible(fn ($record) => in_array(
        $record->status,
        ['New', 'Contacted']
    ))
    ->requiresConfirmation()
    ->action(fn ($record) => $record->update([
        'status' => 'Negotiation',
    ])),

        Action::make('won')
    ->label('Won')
    ->icon('heroicon-o-check-circle')
    ->color('success')
    ->visible(fn ($record) => in_array(
        $record->status,
        ['New', 'Contacted', 'Negotiation']
    ))
    ->requiresConfirmation()
    ->action(fn ($record) => $record->update([
        'status' => 'Won',
    ])),

        Action::make('lost')
    ->label('Lost')
    ->icon('heroicon-o-x-mark')
    ->color('danger')
    ->visible(fn ($record) => in_array(
        $record->status,
        ['New', 'Contacted', 'Negotiation']
    ))
    ->requiresConfirmation()
    ->action(fn ($record) => $record->update([
        'status' => 'Lost',
    ])),

        EditAction::make(),

    ])
        ->label('Actions')
        ->icon('heroicon-o-ellipsis-horizontal'),

])

            ->toolbarActions([
    BulkActionGroup::make([
        DeleteBulkAction::make(),
    ]),

]);
    }
}
