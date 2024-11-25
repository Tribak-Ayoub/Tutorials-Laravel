<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="w-50 bg-light p-5 rounded shadow-sm">
        <h3 class="mb-4 text-center">Contact Us!</h3>

        <form method="POST" action="<?php echo e(url('/contact')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="form-group mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" name="message" id="message" rows="4" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\dev mobile\Welcome-to-Laravel\Prototype\resources\views/contact.blade.php ENDPATH**/ ?>