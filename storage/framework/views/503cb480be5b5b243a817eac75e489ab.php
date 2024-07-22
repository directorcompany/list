
<?php $__env->startSection('title', 'Список продуктов'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Список продуктов</h1>
    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">Добавить продуктов</a>

    <table class="table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->description); ?></td>
                    <td>
                        <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-warning">Редактирование</a>
                        <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" style="display:inline;">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\store\resources\views/products/index.blade.php ENDPATH**/ ?>