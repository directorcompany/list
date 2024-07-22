

<?php $__env->startSection('content'); ?>
    <h1>Список продуктов</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Наименование</th>
                <th>Цена в RUB</th>
                <th>Цена в USD</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->priceInRubles()); ?> RUB</td>
                    <td><?php echo e($product->priceInDollars()); ?> USD</td>
                    <td>
                        <a href="<?php echo e(route('purchases.create')); ?>" class="btn btn-primary">Купить</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\store\resources\views/products.blade.php ENDPATH**/ ?>