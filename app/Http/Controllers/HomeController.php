<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Education;
use Illuminate\Support\Facades\Mail;

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
        $educations = Education::orderBy('year','desc')->get();
        return view('education', compact('educations'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email',
            'message'=>'required|string'
        ]);

        // simple mail to site owner (configure MAIL_* in .env)
        Mail::raw("Message de {$data['name']} ({$data['email']}):\n\n{$data['message']}", function($m) use ($data){
            $m->to(config('mail.from.address'))
              ->subject("Contact portfolio — {$data['name']}");
        });

        return back()->with('success','Merci — votre message a été envoyé.');
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
