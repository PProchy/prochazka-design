<?php

declare(strict_types=1);

// The deploy workflow rewrites this path to the app dir outside the document root
require __DIR__ . '/../vendor/autoload.php';

App\Bootstrap::boot()
	->createContainer()
	->getByType(Nette\Application\Application::class)
	->run();
