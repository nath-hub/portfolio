@extends('layouts.app')

@section('title', $project->title . ' - Nathalie')

@push('styles')
    @vite(['resources/css/detail-project.css'])
@endpush

@push('scripts')
    @vite(['resources/js/detail.js'])
@endpush

@section('content')
    <main class="project-detail">
        <!-- Retour aux projets -->
        <div class="breadcrumb">
            <a href="{{ route('projects') }}" class="back-link">
                <i class="fas fa-arrow-left"></i> Retour aux projets
            </a>
        </div>

        <!-- En-tête du projet -->
        <div class="project-header">
            @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="project-image">
            @else
                <div class="project-image-placeholder">
                    <i class="fas fa-image"></i>
                </div>
            @endif
        </div>

        <!-- Contenu principal -->
        <div class="project-content">
            <div class="project-info">
                <h1>{{ $project->title }}</h1>

                @if($project->stack)
                    <div class="tech-stack">
                        <span class="label">Technologies :</span>
                        <div class="tags">
                            @foreach(explode(',', $project->stack) as $tech)
                                <span class="tag">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($project->description)
                    <div class="description">
                        <h2>À propos du projet</h2>
                        <p>{{ $project->description }}</p>
                    </div>
                @endif

                @if($project->link)
                    <div class="project-links">
                        <a href="{{ $project->link }}" target="_blank" class="btn btn-primary">
                            Voir le projet <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Navigation entre projets -->
        @if($prevProject || $nextProject)
            <div class="project-navigation">
                @if($prevProject)
                    <a href="{{ route('projects.show', $prevProject->slug) }}" class="nav-prev">
                        <span class="nav-label">Projet précédent</span>
                        <span class="nav-title">{{ $prevProject->title }}</span>
                    </a>
                @endif

                @if($nextProject)
                    <a href="{{ route('projects.show', $nextProject->slug) }}" class="nav-next">
                        <span class="nav-label">Projet suivant</span>
                        <span class="nav-title">{{ $nextProject->title }}</span>
                    </a>
                @endif
            </div>
        @endif
    </main>
@endsection
