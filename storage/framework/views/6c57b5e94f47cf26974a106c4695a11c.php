

<?php $__env->startSection('content'); ?>
    <h1>Отчет по продажам</h1>

    <form action="<?php echo e(route('report')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group py-2">
            <label for="product_id">Продукт:</label>
            <select name="product_id" id="product_id" class="form-control">
                <option value="">Все продукты</option>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group py-2">
            <label for="currency_id">Валюта:</label>
            <select name="currency_id" id="currency_id" class="form-control">
                <option value="">Все валюты</option>
                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($currency->id); ?>"><?php echo e($currency->name); ?> (<?php echo e($currency->code); ?>)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group py-2">
            <label>Дата:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="date_filter" id="date_today" value="today" checked>
                <label class="form-check-label" for="date_today">
                    Сегодня
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="date_filter" id="date_week" value="week">
                <label class="form-check-label" for="date_week">
                    За неделю
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Показать отчет</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\store\resources\views/reports/index.blade.php ENDPATH**/ ?>