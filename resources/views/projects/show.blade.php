@extends('layouts.app')

@section('title', $project->title . ' - Nathalie')

@section('content')
<div class="max-w-4xl mx-auto">
  <a href="{{ route('projects') }}" class="inline-flex items-center text-vert-600 hover:underline mb-6">
    ← Retour aux projets
  </a>

  <article class="fade-in">
    @if($project->image)
      <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-96 object-cover rounded-xl mb-8">
    @endif

    <h1 class="text-4xl md:text-5xl font-bold text-vert-600 mb-6">{{ $project->title }}</h1>

    @if($project->stack)
      <div class="flex flex-wrap gap-2 mb-6">
        @foreach(explode(',', $project->stack) as $tech)
          <span class="skill-tag">{{ trim($tech) }}</span>
        @endforeach
      </div>
    @endif

    <div class="card mb-8">
      <h2 class="text-2xl font-semibold text-bordeaux-600 mb-4">Description du projet</h2>
      <div class="text-gray-700 leading-relaxed whitespace-pre-line">
        {{ $project->description }}
      </div>
    </div>

    @if($project->link)
      <div class="text-center">
        <a href="{{ $project->link }}" target="_blank" class="btn btn-primary">
          Voir le projet en ligne →
        </a>
      </div>
    @endif
  </article>
</div>
@endsection
