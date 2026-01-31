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
        <a href="<?php echo e(route('home')); ?>" class="logo">
            <img src="<?php echo e(asset('logo1.png')); ?>" alt="Nathalie Taffot">
        </a>
        <nav>
            <ul>
                <li><a href="<?php echo e(route('home')); ?>" class="active">Accueil</a></li>
                <li><a href="<?php echo e(route('projects')); ?>">Projets</a></li>
                <li><a href="<?php echo e(route('education')); ?>">Formation</a></li>
                <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                <li><a href="<?php echo e(route('about')); ?>">À propos</a></li>
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
<?php /**PATH D:\sites\portfolio-nathalie\resources\views\partials\header.blade.php ENDPATH**/ ?>