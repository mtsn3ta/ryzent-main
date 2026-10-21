<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Notifications\NewLeadNotification;
use App\Notifications\NewLeadEmailNotification;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Anti-spam Honeypot: jika input tersembunyi terisi oleh bot, drop tanpa eksekusi
        if ($request->filled('website_hp')) {
            return back()->with(
                'success',
                'Pesan berhasil dikirim. Tim Ryzent akan segera menghubungi Anda.'
            );
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:5'],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'message.required' => 'Pesan wajib diisi.',
            'message.min' => 'Pesan minimal berisi 5 karakter.',
        ]);

        $contact = Contact::create([
            ...$validated,
            'is_read' => false,
            'status' => 'New',
        ]);

        $admins = User::query()->get();

        foreach ($admins as $admin) {
            $admin->notify(new NewLeadNotification($contact));
            $admin->notify(new NewLeadEmailNotification($contact));
        }

        return back()->with(
            'success',
            'Pesan berhasil dikirim. Tim Ryzent akan segera menghubungi Anda.'
        );
    }
}
