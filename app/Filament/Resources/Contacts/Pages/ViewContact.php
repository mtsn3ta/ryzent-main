<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [

            Action::make('whatsapp')
                ->label('WhatsApp')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color('success')
                ->url(function () {

                    $phone = preg_replace(
                        '/[^0-9]/',
                        '',
                        $this->record->phone
                    );

                    if (str_starts_with($phone, '0')) {
                        $phone = '62' . substr($phone, 1);
                    }

                    return "https://wa.me/{$phone}";
                })
                ->openUrlInNewTab(),

            Action::make('negotiation')
                ->color('warning')
                ->action(function () {
                    $this->record->update([
                        'status' => 'Negotiation',
                    ]);
                }),

            Action::make('won')
                ->color('success')
                ->action(function () {
                    $this->record->update([
                        'status' => 'Won',
                    ]);
                }),

            Action::make('lost')
                ->color('danger')
                ->action(function () {
                    $this->record->update([
                        'status' => 'Lost',
                    ]);
                }),

        ];
    }
}
