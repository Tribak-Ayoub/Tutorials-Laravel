

<?php $__env->startSection('title', $article['title']); ?>

<?php $__env->startSection('content'); ?>
<h1><?php echo e($article['title']); ?></h1>
<p><?php echo e($article['content']); ?></p>
<a href="/articles/">Retour à la liste</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev mobile\Toturials-Laravel\route and controller\Prototype\resources\views/articles/show.blade.php ENDPATH**/ ?>