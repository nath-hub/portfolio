<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        // 1. Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'phone' => 'nullable|string'
        ]);

        // 2. Sauvegarde en BD
        Contact::create($validated);

        // 3. Envoi de l'email

        Mail::to('floretaffot@gmail.com')->send(
            new ContactMessageMail($validated)
        );

        return response()->json(['success' => true]);

    }
}
