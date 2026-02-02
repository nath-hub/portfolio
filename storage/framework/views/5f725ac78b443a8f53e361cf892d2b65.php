<?php $__env->startSection('title', 'Projets - Nathalie'); ?>

<?php $__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/projets.css']); ?>
<?php $__env->stopPush(); ?>

<script>
    // Passer les projets de la BD à JavaScript
    window.projectsData = <?php echo json_encode($projects, 15, 512) ?>;
</script>

<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/projets.js']); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


    
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
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\sites\portfolio-nathalie\resources\views/projects.blade.php ENDPATH**/ ?>