

<?php $__env->startSection('title', $project->title . ' - Nathalie'); ?>

<?php $__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/detail-project.css']); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/detail.js']); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <main class="project-detail">
        <!-- Retour aux projets -->
        <div class="breadcrumb">
            <a href="<?php echo e(route('projects')); ?>" class="back-link">
                <i class="fas fa-arrow-left"></i> Retour aux projets
            </a>
        </div>

        <!-- En-tête du projet -->
        <div class="project-header">
            <?php if($project->image): ?>
                <img src="<?php echo e(asset('storage/' . $project->image)); ?>" alt="<?php echo e($project->title); ?>" class="project-image">
            <?php else: ?>
                <div class="project-image-placeholder">
                    <i class="fas fa-image"></i>
                </div>
            <?php endif; ?>
        </div>

        <!-- Contenu principal -->
        <div class="project-content">
            <div class="project-info">
                <h1><?php echo e($project->title); ?></h1>

                <?php if($project->stack): ?>
                    <div class="tech-stack">
                        <span class="label">Technologies :</span>
                        <div class="tags">
                            <?php $__currentLoopData = explode(',', $project->stack); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="tag"><?php echo e(trim($tech)); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($project->description): ?>
                    <div class="description">
                        <h2>À propos du projet</h2>
                        <p><?php echo e($project->description); ?></p>
                    </div>
                <?php endif; ?>

                <?php if($project->link): ?>
                    <div class="project-links">
                        <a href="<?php echo e($project->link); ?>" target="_blank" class="btn btn-primary">
                            Voir le projet <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Navigation entre projets -->
        <?php if($prevProject || $nextProject): ?>
            <div class="project-navigation">
                <?php if($prevProject): ?>
                    <a href="<?php echo e(route('projects.show', $prevProject->slug)); ?>" class="nav-prev">
                        <span class="nav-label">Projet précédent</span>
                        <span class="nav-title"><?php echo e($prevProject->title); ?></span>
                    </a>
                <?php endif; ?>

                <?php if($nextProject): ?>
                    <a href="<?php echo e(route('projects.show', $nextProject->slug)); ?>" class="nav-next">
                        <span class="nav-label">Projet suivant</span>
                        <span class="nav-title"><?php echo e($nextProject->title); ?></span>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\sites\portfolio-nathalie\resources\views/projects/show.blade.php ENDPATH**/ ?>