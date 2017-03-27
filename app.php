<?php

use Symfony\Component\HttpFoundation\Request;

/**
 * @var \Composer\Autoload\ClassLoader $loader
 */
$loader = require __DIR__.'/app/autoload.php';

$env = getenv('SYMFONY_ENV') ?: 'prod';
$kernel = new AppKernel($env, $env !== 'prod');
$kernel->boot();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
