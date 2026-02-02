<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
     public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('projects', compact('projects'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        
        // Récupérer les projets suivant et précédent pour la navigation
        $nextProject = Project::where('id', '>', $project->id)->first();
        $prevProject = Project::where('id', '<', $project->id)->orderBy('id', 'desc')->first();

        return view('projects.show', compact('project', 'nextProject', 'prevProject'));
    }
}
