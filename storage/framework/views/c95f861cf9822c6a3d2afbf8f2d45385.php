<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Laravel'); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <!-- Bootstrap CSS (последняя версия) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <div id="app">
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">Laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('currencies.index')); ?>">Валюты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('currency_rates.index')); ?>">Курсы Валют</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('products.index')); ?>">Продукты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('product_prices.index')); ?>">Цены продуктов</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('purchases.index')); ?>">Покупки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('report.index')); ?>">Отчеты продаж</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="container mt-4">
            <?php echo $__env->yieldContent('content'); ?>
            
            <!-- Success/Failure Messages -->
             <?php if(session('success')): ?>
                <div class="alert alert-success mt-4">
                    <?php echo e(session('success')); ?>

                </div>
                <?php elseif(session('error')): ?>
                <div class="alert alert-danger mt-4">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Scripts -->
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH C:\OSPanel\domains\store\resources\views/layouts/app.blade.php ENDPATH**/ ?>