<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditContact extends EditRecord
{
    protected static string $resource = ContactResource::class;

    public function mount(int|string $record): void
    {
        parent::mount($record);

        $updateData = [];

        if (! $this->record->is_read) {
            $updateData['is_read'] = true;
        }

        if ($this->record->status === 'New') {
            $updateData['status'] = 'Contacted';
        }

        if (! empty($updateData)) {
            $this->record->update($updateData);

            // Refresh record setelah update
            $this->record->refresh();
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
