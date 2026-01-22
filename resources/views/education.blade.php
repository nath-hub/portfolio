@extends('layouts.app')

@section('title', 'Parcours - Nathalie')

@section('content')
<div class="max-w-4xl mx-auto">
  <div class="mb-12 fade-in">
    <h1 class="text-4xl md:text-5xl font-bold text-vert-600 mb-4">Mon Parcours</h1>
    <p class="text-lg text-gray-600">Formation académique et professionnelle</p>
  </div>

  @if($education->count() > 0)
    <div class="space-y-8">
      @foreach($education as $edu)
        <div class="timeline-item fade-in">
          <div class="card">
            @if($edu->year)
              <div class="inline-block bg-vert-600 text-white px-4 py-1 rounded-full text-sm font-semibold mb-3">
                {{ $edu->year }}
              </div>
            @endif

            <h3 class="text-2xl font-semibold text-bordeaux-600 mb-2">{{ $edu->degree }}</h3>
            <p class="text-lg text-gray-700 font-medium mb-3">{{ $edu->school }}</p>

            @if($edu->description)
              <p class="text-gray-600 leading-relaxed">{{ $edu->description }}</p>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="card text-center py-12 fade-in">
      <div class="text-6xl mb-4">🎓</div>
      <h3 class="text-2xl font-semibold text-gray-700 mb-2">Parcours en cours d'ajout</h3>
      <p class="text-gray-600">Les informations seront bientôt disponibles.</p>
    </div>
  @endif

  <div class="mt-16 fade-in">
    <div class="card bg-gray-50">
      <h2 class="text-2xl font-semibold text-vert-600 mb-4">Certifications & Formations continues</h2>
      <div class="grid md:grid-cols-2 gap-4">
        <div class="flex items-start gap-3">
          <span class="text-2xl">✓</span>
          <div>
            <h4 class="font-semibold">Laravel Certified Developer</h4>
            <p class="text-sm text-gray-600">Certification officielle Laravel</p>
          </div>
        </div>
        <div class="flex items-start gap-3">
          <span class="text-2xl">✓</span>
          <div>
            <h4 class="font-semibold">AWS Solutions Architect</h4>
            <p class="text-sm text-gray-600">Amazon Web Services</p>
          </div>
        </div>
        <div class="flex items-start gap-3">
          <span class="text-2xl">✓</span>
          <div>
            <h4 class="font-semibold">Docker & Kubernetes</h4>
            <p class="text-sm text-gray-600">Formation avancée conteneurisation</p>
          </div>
        </div>
        <div class="flex items-start gap-3">
          <span class="text-2xl">✓</span>
          <div>
            <h4 class="font-semibold">Clean Architecture</h4>
            <p class="text-sm text-gray-600">Conception logicielle avancée</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
