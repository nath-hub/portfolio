<?php $__env->startSection('title','Accueil - Nathalie'); ?>
<?php $__env->startSection('content'); ?>
  <section id="hero" class="py-12">
    <div class="flex items-center gap-8">
      <div>
        <h1 class="text-4xl font-extrabold text-green-700">Bonjour, je suis Nathalie</h1>
        <p class="mt-3 text-lg text-gray-700">Développeuse full stack spécialisée en Laravel, intégrations API et déploiement cloud.</p>
        <div class="mt-6">
          <a href="<?php echo e(route('projects')); ?>" class="px-4 py-2 rounded bg-green-700 text-white hover:bg-bordeaux-700 transition">Voir mes projets</a>
        </div>
      </div>
      <div class="ml-auto">
        <img src="<?php echo e(asset('images/profile-placeholder.png')); ?>" alt="Nathalie" class="w-48 h-48 rounded-full shadow-lg">
      </div>
    </div>
  </section>

  <section id="projects-preview" class="mt-12">
    <h2 class="text-2xl font-semibold mb-4">Projets récents</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article class="p-4 border rounded hover:shadow-lg transition reveal">
          <h3 class="font-bold text-lg"><?php echo e($p->title); ?></h3>
          <p class="text-sm text-gray-600 mt-2"><?php echo e(Str::limit($p->description,120)); ?></p>
          <div class="mt-3 text-xs text-gray-500"><?php echo e($p->stack); ?></div>
        </article>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\sites\portfolio-nathalie\resources\views\pages\home.blade.php ENDPATH**/ ?>