<h3 class="text-center page-title">Search for user by ID</h3>

<?php if(session('error')): ?>
<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
<?php endif; ?>

<form action="<?php echo e(route('users.search')); ?>" method="POST">
<?php echo csrf_field(); ?>
<div class="form-group">
<input id="user_id" class="form-control" name="user_id" type="text" value="<?php echo e(old('user_id')); ?>" placeholder="User ID">
</div>
<input class="btn btn-info" type="submit" value="Search">
</form><?php /**PATH C:\xampp\htdocs\app\resources\views/users/index.blade.php ENDPATH**/ ?>