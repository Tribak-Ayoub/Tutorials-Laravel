

<?php $__env->startSection('content'); ?>
<h1>Créer Un Article</h1>
<form action="/articles" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="title" class="form-label">Titre :</label><br>
        <input type="text" name="title" value="" required class="form-control">
    </div><br>
    <div class="form-group">
        <label for="content" class="form-label">Contenu :</label><br>
        <textarea name="content" required class="form-control"></textarea>
    </div><br>

    <button type="submit" class="btn btn-info text-white">Create</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev mobile\Toturials-Laravel\route and controller\Prototype\resources\views/articles/create.blade.php ENDPATH**/ ?>