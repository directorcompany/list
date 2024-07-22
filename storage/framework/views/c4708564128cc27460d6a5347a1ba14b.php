
<?php $__env->startSection('title', 'Список покупок'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Список покупок</h1>
    <a href="<?php echo e(route('purchases.create')); ?>" class="btn btn-primary">Добавить покупки</a>

    <table class="table">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Продукт</th>
                <th>Валюта</th>
                <th>Оплата</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($purchase->name); ?></td>
                    <td><?php echo e($purchase->phone); ?></td>
                    <td><?php echo e($purchase->product->name); ?></td>
                    <td><?php echo e($purchase->currency->code); ?></td>
                    <td><?php echo e($purchase->amount); ?></td>
                    <td>
                        <a href="<?php echo e(route('purchases.edit', $purchase->id)); ?>" class="btn btn-warning">Редактирование</a>
                        <form action="<?php echo e(route('purchases.destroy', $purchase->id)); ?>" method="POST" style="display:inline;">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\store\resources\views/purchases/index.blade.php ENDPATH**/ ?>