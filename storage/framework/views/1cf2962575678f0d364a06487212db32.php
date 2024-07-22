
<?php $__env->startSection('title', 'Список валют'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Список валют</h1>
    <a href="<?php echo e(route('currencies.create')); ?>" class="btn btn-primary">Добавить валюту</a>

    <table class="table">
        <thead>
            <tr>
                <th>Код</th>
                <th>Название</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($currency->code); ?></td>
                    <td><?php echo e($currency->name); ?></td>
                    <td>
                        <a href="<?php echo e(route('currencies.edit', $currency->id)); ?>" class="btn btn-warning">Редактирование</a>
                        <form action="<?php echo e(route('currencies.destroy', $currency->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Удаление</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\store\resources\views/currencies/index.blade.php ENDPATH**/ ?>