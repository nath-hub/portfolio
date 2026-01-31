<?php $__env->startSection('title', $project->title . ' - Nathalie'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto">
  <a href="<?php echo e(route('projects')); ?>" class="inline-flex items-center text-vert-600 hover:underline mb-6">
    ← Retour aux projets
  </a>

  <article class="fade-in">
    <?php if($project->image): ?>
      <img src="<?php echo e(asset('storage/' . $project->image)); ?>" alt="<?php echo e($project->title); ?>" class="w-full h-96 object-cover rounded-xl mb-8">
    <?php endif; ?>

    <h1 class="text-4xl md:text-5xl font-bold text-vert-600 mb-6"><?php echo e($project->title); ?></h1>

    <?php if($project->stack): ?>
      <div class="flex flex-wrap gap-2 mb-6">
        <?php $__currentLoopData = explode(',', $project->stack); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <span class="skill-tag"><?php echo e(trim($tech)); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    <?php endif; ?>

    <div class="card mb-8">
      <h2 class="text-2xl font-semibold text-bordeaux-600 mb-4">Description du projet</h2>
      <div class="text-gray-700 leading-relaxed whitespace-pre-line">
        <?php echo e($project->description); ?>

      </div>
    </div>

    <?php if($project->link): ?>
      <div class="text-center">
        <a href="<?php echo e($project->link); ?>" target="_blank" class="btn btn-primary">
          Voir le projet en ligne →
        </a>
      </div>
    <?php endif; ?>
  </article>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\sites\portfolio-nathalie\resources\views\projects\show.blade.php ENDPATH**/ ?>