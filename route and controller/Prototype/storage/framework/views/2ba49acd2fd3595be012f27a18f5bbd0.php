<?php $__env->startSection('title', 'Liste des Articles'); ?>

<?php $__env->startSection('content'); ?>
<h1>Liste des Articles</h1>

<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div>
    <h3><?php echo e($article['title']); ?></h3>
    <a href="/articles/<?php echo e($article['id']); ?>">Lire l'article</a>
<form action="/articles/<?php echo e($article['id']); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev mobile\Toturials-Laravel\route and controller\Prototype\resources\views/articles/index.blade.php ENDPATH**/ ?>