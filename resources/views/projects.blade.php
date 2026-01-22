@extends('layouts.app')

@section('title', 'Projets - Nathalie')

@section('content')
<div class="mb-12 fade-in">
  <h1 class="text-4xl md:text-5xl font-bold text-vert-600 mb-4">Mes Projets</h1>
  <p class="text-lg text-gray-600">Découvrez une sélection de mes réalisations en développement backend et full stack.</p>
</div>

@if($projects->count() > 0)
  <div class="project-grid">
    @foreach($projects as $project)
      <div class="card fade-in">
        @if($project->image)
          <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover rounded-lg mb-4">
        @else
          <div class="w-full h-48 bg-gray-200 rounded-lg mb-4 flex items-center justify-center">
            <span class="text-gray-400 text-4xl">💼</span>
          </div>
        @endif

        <h3 class="text-xl font-semibold text-bordeaux-600 mb-2">{{ $project->title }}</h3>

        <p class="text-gray-600 mb-4 line-clamp-3">{{ $project->description }}</p>

        @if($project->stack)
          <div class="flex flex-wrap gap-2 mb-4">
            @foreach(explode(',', $project->stack) as $tech)
              <span class="skill-tag">{{ trim($tech) }}</span>
            @endforeach
          </div>
        @endif

        <div class="flex gap-3">
          <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-primary text-sm py-2 px-4">
            Voir détails
          </a>
          @if($project->link)
            <a href="{{ $project->link }}" target="_blank" class="btn btn-secondary text-sm py-2 px-4">
              Démo →
            </a>
          @endif
        </div>
      </div>
    @endforeach
  </div>
@else
  <div class="card text-center py-12">
    <div class="text-6xl mb-4">🚧</div>
    <h3 class="text-2xl font-semibold text-gray-700 mb-2">Projets en cours d'ajout</h3>
    <p class="text-gray-600">Revenez bientôt pour découvrir mes réalisations !</p>
  </div>
@endif
@endsection
