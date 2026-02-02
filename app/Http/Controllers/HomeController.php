<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Education;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    public function home()
    {
        $projects = Project::latest()->take(6)->get();
        return view('home', compact('projects'));
    }

    public function about()
    {
        return view('about');
    }

    public function projects()
    {
        $projects = Project::latest()->get();
        return view('projects', compact('projects'));
    }

    public function skills()
    {
        return view('skills');
    }

    public function education()
    {
        $educations = Education::orderBy('year', 'desc')->get();
        return view('education', compact('educations'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        try {
            $data = $request->validate([
                'email' => 'required|email',
                'message' => 'required|string',
                'name' => 'required|string|max:255',
                'subject' => 'required|string|max:255',
                'phone' => 'nullable|string'
            ]);

            // 2. Sauvegarde en BD
            Contact::create($data);

            // 3. Envoi de l'email
            Mail::to('floretaffot@gmail.com')->send(
                new ContactMessageMail($data)
            );

            return response()->json(['success' => true, 'message' => 'Merci — votre message a été envoyé.'], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'envoi du message. Veuillez réessayer plus tard.'
            ], 500);
        }
    }


    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('projects', compact('projects'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('projects.show', compact('project'));
    }

}
