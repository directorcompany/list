

<?php $__env->startSection('content'); ?>
    <h1>Отчет по продажам</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Продукт</th>
                <th>Цена (в выбранной валюте)</th>
                <th>Дата покупки</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($purchase->name); ?></td>
                    <td><?php echo e($purchase->phone); ?></td>
                    <td><?php echo e($purchase->product->name); ?></td>
                    <td><?php echo e($purchase->amount); ?> <?php echo e($purchase->currency->code); ?></td>
                    <td><?php echo e($purchase->created_at->format('Y-m-d H:i:s')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\store\resources\views/reports/show.blade.php ENDPATH**/ ?>