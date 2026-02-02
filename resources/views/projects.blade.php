@extends('layouts.app')

@section('title', 'Projets - Nathalie')

@push('styles')
    @vite(['resources/css/projets.css'])
@endpush

<script>
    // Passer les projets de la BD à JavaScript
    window.projectsData = @json($projects);
</script>

@push('scripts')
    @vite(['resources/js/projets.js'])
@endpush

@section('content')


    {{-- @if ($projects->count() > 0) --}}
        <main class="projects-container">
            <div class="hero-projects">
                <h1>Mes Projets</h1>
                <p>Une sélection de mes réalisations les plus marquantes au fil des années</p>
            </div>

            <div class="filter-container">
                <button class="filter-btn active" data-filter="all"><span>Tous</span></button>
                <button class="filter-btn" data-filter="web"><span>Web App</span></button>
                <button class="filter-btn" data-filter="mobile"><span>Mobile</span></button>
                <button class="filter-btn" data-filter="ecommerce"><span>E-commerce</span></button>
                <button class="filter-btn" data-filter="saas"><span>SaaS</span></button>
            </div>

            <div class="projects-grid" id="projectsGrid">
                <!-- Les projets seront générés dynamiquement -->
            </div>

            <div class="load-more-container">
                <button class="load-more-btn" id="loadMoreBtn">Voir Plus de Projets</button>
                <p class="project-count">Affichage de <span id="currentCount">6</span> sur <span id="totalCount">18</span>
                    projets</p>
            </div>
        </main>
    {{-- @else
        <div class="card text-center py-12">
            <div class="text-6xl mb-4">🚧</div>
            <h3 class="text-2xl font-semibold text-gray-700 mb-2">Projets en cours d'ajout</h3>
            <p class="text-gray-600">Revenez bientôt pour découvrir mes réalisations !</p>
        </div>
    @endif --}}
@endsection
