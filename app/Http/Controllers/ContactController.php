<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Notifications\NewLeadNotification;
use Illuminate\Http\Request;
use App\Notifications\NewLeadEmailNotification;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'max:50'],
            'subject' => ['nullable', 'max:255'],
            'message' => ['required'],
        ]);

        $contact = Contact::create([
    ...$validated,
    'is_read' => false,
    'status' => 'New',
]);

        $admins = User::all();

$admins = User::query()->get();

foreach ($admins as $admin) {
    $admin->notify(
        new NewLeadNotification($contact)
    );

    $admin->notify(
        new NewLeadEmailNotification($contact)
    );
}

        return back()->with(
            'success',
            'Pesan berhasil dikirim. Tim Ryzent akan segera menghubungi Anda.'
        );
    }
}
