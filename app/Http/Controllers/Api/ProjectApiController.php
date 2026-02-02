<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectApiController extends Controller
{
    /**
     * Récupérer tous les projets
     */
    public function index()
    {
        try {
            $projects = Project::latest()->get();
            return response()->json([
                'success' => true,
                'data' => $projects,
                'count' => $projects->count()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des projets',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Récupérer un projet par ID ou slug
     */
    public function show($id)
    {
        try {
            // Chercher par ID d'abord, puis par slug
            $project = Project::find($id) ?? Project::where('slug', $id)->firstOrFail();

            return response()->json([
                'success' => true,
                'data' => $project
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Projet non trouvé',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Créer un nouveau projet
     */
    public function store(Request $request)
    {
        try {
            // Validation des données
            $validated = $request->validate([
                'title' => 'required|string|max:255|unique:projects',
                'description' => 'nullable|string',
                'stack' => 'nullable|string',
                'link' => 'nullable|url',
                'image' => 'nullable|string',
                'slug' => 'nullable|string|unique:projects',
            ]);

            // Générer un slug s'il n'est pas fourni
            if (!isset($validated['slug']) || empty($validated['slug'])) {
                $validated['slug'] = Str::slug($validated['title']);
            }

            $project = Project::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Projet créé avec succès',
                'data' => $project
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création du projet',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mettre à jour un projet
     */
    public function update(Request $request, $id)
    {
        try {
            // Chercher le projet par ID ou slug
            $project = Project::find($id) ?? Project::where('slug', $id)->firstOrFail();

            // Validation des données
            $validated = $request->validate([
                'title' => 'sometimes|required|string|max:255|unique:projects,title,' . $project->id,
                'description' => 'nullable|string',
                'stack' => 'nullable|string',
                'link' => 'nullable|url',
                'image' => 'nullable|string',
                'slug' => 'sometimes|nullable|string|unique:projects,slug,' . $project->id,
            ]);

            // Générer un slug s'il est modifié mais vide
            if (isset($validated['title']) && !isset($validated['slug'])) {
                $validated['slug'] = Str::slug($validated['title']);
            }

            $project->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Projet modifié avec succès',
                'data' => $project
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la modification du projet',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Supprimer un projet
     */
    public function destroy($id)
    {
        try {
            // Chercher le projet par ID ou slug
            $project = Project::find($id) ?? Project::where('slug', $id)->firstOrFail();

            $projectTitle = $project->title;
            $project->delete();

            return response()->json([
                'success' => true,
                'message' => "Projet '{$projectTitle}' supprimé avec succès"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression du projet',
                'error' => $e->getMessage()
            ], 404);
        }
    }
}
