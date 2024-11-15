<?php

error_reporting(E_ALL); // Error/Exception engine, always use E_ALL
ini_set('ignore_repeated_errors', TRUE); // always use TRUE
ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment
ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set("error_log", __DIR__ . '\php-error.log');

// Incluimos el autoload de clases con Composer para que las librerías se puedan cargar automáticamente, por demanda según se vayan usando
$loader = require('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Iniciamos una sesión y generamos el CSRF token
require_once __DIR__ . "/src/lib/session.php";
require_once __DIR__ . "/src/lib/csrf.php";
$session = new \Web\Gym\lib\Session();
$csrf = new \Web\Gym\lib\CSRF();
$session->init();
$csrf->generateToken();

// Se establece la URL base como una constante para poder usarlo donde sea
$base_url = ((isset($_SERVER['HTTPS'])) ? "https" : "http");
$base_url .= "://" . $_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
$base_url = rtrim($base_url, '/');
define('BASE_URL', $base_url);

// Aquí se cargan las rutas de la aplicación
$router = new Bramus\Router\Router();
$router->setNamespace('\Web\Gym\controller');
$router->set404('GymController@erro_404');

$backendRouter = new Web\Gym\routes\BackendRoutes();
$frontendRoutes = new Web\Gym\routes\FrontendRoutes();
$backendRouter->loadRoutes($router);
$frontendRoutes->loadRoutes($router);

$router->run();
