@extends('layouts.app')

@section('title', 'Portfolio - Nathalie Taffot')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-background">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>

        <div class="hero-content">
            <div class="hero-text">
                <h1>
                    Bonjour, je suis<br>
                    <span class="gradient-text">Développeur Full Stack</span>
                </h1>
                <p>
                    En tant que professionnelle passionnée et motivée, j'essaie toujours d'améliorer ma technique,
                    d'étendre mon champ de compétences et de trouver de nouvelles opportunités de développement.
                    Tous mes projets, aussi bien individuels que collaboratifs, m'ont permis de progresser et d'établir
                    mon activité dans ce secteur très compétitif.
                    Consultez mon portfolio et n'hésitez pas à me contacter si vous avez des questions.
                </p>
                <div class="hero-buttons">
                    <a href="projects.html" class="btn btn-primary">
                        Voir mes projets →
                    </a>
                    <a href="contact.html" class="btn btn-secondary">
                        Me contacter
                    </a>
                </div>
            </div>

            <div class="hero-image">
                <div class="hero-image-wrapper">
                    <div style="font-size: 8rem;">👨‍💻</div>
                </div>
                <div class="floating-icons">
                    <div class="floating-icon">⚛️</div>
                    <div class="floating-icon">🎨</div>
                    <div class="floating-icon">💻</div>
                    <div class="floating-icon">🚀</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number" data-target="10">0</div>
                <div class="stat-label">Projets réalisés</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="6">0</div>
                <div class="stat-label">Clients satisfaits</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="8">0</div>
                <div class="stat-label">Années d'expérience</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="5">0</div>
                <div class="stat-label">Technologies maîtrisées</div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="cta-container">
            <h2>Prêt à démarrer un projet ?</h2>
            <p>Discutons de votre prochain projet et créons quelque chose d'extraordinaire ensemble.</p>
            <a href="contact" class="btn btn-primary">Démarrer un projet →</a>
        </div>
    </section>

@endsection
