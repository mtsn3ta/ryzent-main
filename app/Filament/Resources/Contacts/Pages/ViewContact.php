<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use Spatie\Activitylog\Models\Activity;


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

            Action::make('timeline')
    ->label('Timeline')
    ->icon('heroicon-o-clock')
    ->modalHeading('Activity Timeline')
    ->modalSubmitAction(false)
    ->modalCancelActionLabel('Tutup')
    ->modalContent(function () {

        $activities = Activity::query()
            ->where('subject_type', \App\Models\Contact::class)
            ->where('subject_id', $this->record->id)
            ->latest()
            ->get();

        $html = '<div class="space-y-4">';

        foreach ($activities as $activity) {

            $html .= '<div style="border-left:3px solid #3b82f6;padding-left:12px;margin-bottom:12px;">';

            $html .= '<strong>'
                . ucfirst($activity->description)
                . '</strong><br>';

            $html .= '<small>'
                . $activity->created_at->format('d M Y H:i')
                . '</small>';

            $html .= '<pre style="margin-top:8px;font-size:12px;">'
                . json_encode(
                    $activity->properties,
                    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
                )
                . '</pre>';

            $html .= '</div>';
        }

        $html .= '</div>';

        return new \Illuminate\Support\HtmlString($html);
    }),

        ];
    }
}
