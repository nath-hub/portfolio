<!-- Loader -->
<div class="loader">
    <div class="loader-spinner"></div>
    <div class="loader-text">Chargement...</div>
</div>

<!-- Scroll Progress -->
<div class="scroll-progress"></div>

<!-- Header -->
<header>
    <div class="nav-container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('logo1.png') }}" alt="Nathalie Taffot">
        </a>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a></li>
                <li><a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">Projets</a></li>
                <li><a href="{{ route('education') }}" class="{{ request()->routeIs('education') ? 'active' : '' }}">Formation</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">À propos</a></li>
            </ul>
        </nav>
        <button class="theme-toggle" aria-label="Toggle theme">🌙</button>
        <div class="burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>
