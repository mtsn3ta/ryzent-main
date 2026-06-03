<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewLeadEmailNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Contact $contact
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('🔔 New Lead Ryzent')
            ->greeting('New Lead Received')
            ->line('Nama: ' . $this->contact->name)
            ->line('Email: ' . $this->contact->email)
            ->line('WhatsApp: ' . $this->contact->phone)
            ->line('Subject: ' . ($this->contact->subject ?? '-'))
            ->line('Message:')
            ->line($this->contact->message)
            ->action(
                'Open CRM',
                url('/admin/contacts')
            );
    }
}
