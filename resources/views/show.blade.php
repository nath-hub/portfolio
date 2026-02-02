@extends('layouts.app')

{{-- @section('title', $project->title . ' - Nathalie') --}}

@push('styles')
    @vite(['resources/css/detail.css'])
@endpush

@push('scripts')
    @vite(['resources/js/detail.js'])
@endpush


@section('content')
    <div class="project-page">
        <!-- BACK BUTTON -->
        <a href="#" class="back-button" title="Retour">
            <i class="fas fa-arrow-left"></i>
        </a>

        <!-- HERO SECTION WITH SLIDER -->
        <div class="hero-section">
            <div class="slider-container">
                <div class="slider-wrapper">
                    <div class="slider-item active">
                        <img src="https://images.unsplash.com/photo-1501504905252-473c47e087f8?w=1400&h=600&fit=crop"
                            alt="Solutravo Dashboard">
                        <div class="slider-overlay">
                            <span class="slider-caption">Dashboard Principal - Interface épurée</span>
                        </div>
                    </div>
                    <div class="slider-item">
                        <img src="https://images.unsplash.com/photo-1522071820081-8ceabf7b4e93?w=1400&h=600&fit=crop"
                            alt="Cours en direct">
                        <div class="slider-overlay">
                            <span class="slider-caption">Système de cours en direct avec WebRTC</span>
                        </div>
                    </div>
                    <div class="slider-item">
                        <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=1400&h=600&fit=crop"
                            alt="Quiz intéractif">
                        <div class="slider-overlay">
                            <span class="slider-caption">Plateforme Quiz Interactive</span>
                        </div>
                    </div>
                    <div class="slider-item">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=1400&h=600&fit=crop"
                            alt="Communauté">
                        <div class="slider-overlay">
                            <span class="slider-caption">Espace communauté d'apprenants</span>
                        </div>
                    </div>
                </div>

                <div class="slider-arrows">
                    <button class="slider-arrow" onclick="prevSlide()">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="slider-arrow" onclick="nextSlide()">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <div class="slider-nav">
                    <span class="slider-dot active" onclick="goToSlide(0)"></span>
                    <span class="slider-dot" onclick="goToSlide(1)"></span>
                    <span class="slider-dot" onclick="goToSlide(2)"></span>
                    <span class="slider-dot" onclick="goToSlide(3)"></span>
                </div>
            </div>
        </div>

        <!-- PROJECT INFO -->
        <div class="project-info">
            <div class="info-card">
                <!-- HEADER INFO -->
                <div class="project-header">
                    <div class="project-title-section">
                        <div class="project-category">Saas Educatif</div>
                        <h1>Solutravo</h1>
                        <p class="project-description">
                            Plateforme e-learning interactive révolutionnaire offrant une expérience d'apprentissage
                            immersive avec cours vidéo en direct, quiz adaptatifs, système de certification automatisé et
                            une communauté vibrante d'apprenants collaboratifs.
                        </p>
                        <div class="tags-container">
                            <span class="tag">SaaS</span>
                            <span class="tag">Education</span>
                            <span class="tag">Real-time</span>
                        </div>
                    </div>
                    <div class="tech-stack">
                        <div class="tech-title">Stack Technologique</div>
                        <div class="tech-items">
                            <div class="tech-item">Vue.js</div>
                            <div class="tech-item">Django</div>
                            <div class="tech-item">WebRTC</div>
                            <div class="tech-item">PostgreSQL</div>
                        </div>
                    </div>
                </div>

                <div class="section-divider"></div>

                <!-- SECTIONS -->
                <div class="sections-grid">
                    <div class="section-block">
                        <div class="section-title">
                            <i class="fas fa-lightbulb"></i>
                            Concept & Objectifs
                        </div>
                        <div class="section-content">
                            Solutravo a été créé pour démocratiser l'accès à l'éducation de qualité en ligne. La plateforme
                            combine technologie moderne et pédagogie innovante pour créer un environnement d'apprentissage
                            inclusif et engageant.
                        </div>
                        <ul class="features-list">
                            <li>Accessibilité mondiale 24/7</li>
                            <li>Expérience utilisateur fluide</li>
                            <li>Engagement communautaire</li>
                            <li>Certification reconnue</li>
                        </ul>
                    </div>

                    <div class="section-block">
                        <div class="section-title">
                            <i class="fas fa-star"></i>
                            Fonctionnalités Clés
                        </div>
                        <div class="section-content">
                            La plateforme offre une suite complète de features pensées pour l'apprentissage moderne et
                            efficace.
                        </div>
                        <ul class="features-list">
                            <li>Streaming vidéo HD en direct</li>
                            <li>Quiz adaptatifs et intelligent</li>
                            <li>Certificats numériques</li>
                            <li>Forum communautaire</li>
                        </ul>
                    </div>
                </div>

                <!-- STATS -->
                <div class="stats-row">
                    <div class="stat-box">
                        <div class="stat-number">50K+</div>
                        <div class="stat-label">Utilisateurs actifs</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Cours disponibles</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Satisfaction client</div>
                    </div>
                </div>

                <!-- CTA BUTTONS -->
                <div class="cta-section">
                    <button class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                        Voir le projet en live
                    </button>
                    <button class="btn btn-secondary">
                        <i class="fas fa-code"></i>
                        Voir le code source
                    </button>
                </div>
            </div>

            <!-- GALLERY SECTION -->
            <div class="gallery-section">
                <h2 class="gallery-title">Galerie du Projet</h2>
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=300&fit=crop"
                            alt="Page d'accueil">
                        <div class="gallery-overlay">
                            <div class="gallery-overlay-icon">
                                <i class="fas fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=300&fit=crop"
                            alt="Profil utilisateur">
                        <div class="gallery-overlay">
                            <div class="gallery-overlay-icon">
                                <i class="fas fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1522071820081-8ceabf7b4e93?w=400&h=300&fit=crop"
                            alt="Interface de cours">
                        <div class="gallery-overlay">
                            <div class="gallery-overlay-icon">
                                <i class="fas fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER CTA -->
            <div class="footer-cta">
                <h2>Intéressé par ce type de projet ?</h2>
                <p>Je suis disponible pour discuter de vos idées et transformer vos concepts en applications robustes et
                    scalables. Contactez-moi pour démarrer votre prochain projet.</p>
                <button class="btn btn-primary">
                    <i class="fas fa-envelope"></i>
                    Commençons ensemble
                </button>
            </div>
        </div>
    </div>
@endsection
