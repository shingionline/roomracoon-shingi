<?php 

/**
 * Autoloader
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Error and Exception handling
 */
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

// initialize the router
$router = new Core\Router();

// add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('cart', ['controller' => 'Cart', 'action' => 'index']);
$router->add('cart/{id:\d+}/add', ['controller' => 'Cart', 'action' => 'addProduct', 'id' => 3]);

$router->dispatch($_SERVER['QUERY_STRING']);

