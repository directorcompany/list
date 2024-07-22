

<?php $__env->startSection('title', 'Курсы валют'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h1>Курсы валют</h1>

    <a href="<?php echo e(route('currency_rates.create')); ?>" class="btn btn-primary mb-3">Добавить новый курс</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Валюта</th>
                <th>Курс</th>
                <th>Дата</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($rate->currency->name); ?></td>
                    <td><?php echo e($rate->rate); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($rate->date)->format('d.m.Y')); ?></td>
                    <td>
                        <a href="<?php echo e(route('currency_rates.edit', $rate)); ?>" class="btn btn-warning btn-sm">Редактировать</a>
                        <form action="<?php echo e(route('currency_rates.destroy', $rate)); ?>" method="POST" style="display:inline;">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\store\resources\views/currency_rates/index.blade.php ENDPATH**/ ?>