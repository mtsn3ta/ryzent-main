<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewLeadNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Contact $contact
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'New Lead Received',
            'name' => $this->contact->name,
            'subject' => $this->contact->subject,
            'contact_id' => $this->contact->id,
        ];
    }
}
