

<?php $__env->startSection('title', 'Цены на продукты'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h1>Цены на продукты</h1>

    <a href="<?php echo e(route('product_prices.create')); ?>" class="btn btn-primary mb-3">Добавить новую цену</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Продукт</th>
                <th>Валюта</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($price->product->name); ?></td>
                    <td><?php echo e($price->currency->name); ?></td>
                    <td><?php echo e($price->price); ?></td>
                    <td>
                        <a href="<?php echo e(route('product_prices.edit', $price)); ?>" class="btn btn-warning btn-sm">Редактировать</a>
                        <form action="<?php echo e(route('product_prices.destroy', $price)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\store\resources\views/product_prices/index.blade.php ENDPATH**/ ?>