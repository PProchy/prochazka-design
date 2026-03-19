<?php

declare(strict_types=1);

// Detect environment - local (Docker) vs production (shared hosting)
$localVendor = __DIR__ . '/../vendor/autoload.php';
$productionVendor = __DIR__ . '/../../../design/vendor/autoload.php';

if (file_exists($localVendor)) {
    require $localVendor;
} elseif (file_exists($productionVendor)) {
    require $productionVendor;
} else {
    die('Vendor autoload not found. Run composer install.');
}

App\Bootstrap::boot()
    ->createContainer()
    ->getByType(Nette\Application\Application::class)
    ->run();
