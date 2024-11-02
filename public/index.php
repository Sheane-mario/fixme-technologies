<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AuthController;
use app\core\Application;
use app\controllers\SiteController;
use app\controllers\CustomerController;
use app\controllers\TechnicianController;
use app\controllers\ServiceCentreController;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class, 'home']);
//$app->router->get('/customer-sign-up', [CustomerController::class, 'customerSignUp']);
//$app->router->get('/technician-sign-up', [TechnicianController::class, 'technicianSignUp']);
$app->router->get('/technician-landing', [TechnicianController::class, 'technicianLanding']);
$app->router->get('/service-centre-landing', [ServiceCentreController::class, 'serviceCentreLanding']);
$app->router->get('/service-centre-dashboard', [ServiceCentreController::class, 'serviceCentreDashboard']);
//$app->router->get('/service-centre-sign-up', [ServiceCentreController::class, 'serviceCentreSignup']);
//$app->router->get('/service-centre-login', [ServiceCentreController::class, 'serviceCentreLogin']);
$app->router->get('/technician-home', [TechnicianController::class, 'technicianHome']);
$app->router->get('/technician-dashboard', [TechnicianController::class, 'technicianDashboard']);
$app->router->get('/technician-map', [TechnicianController::class, 'technicianMap']);

// Auth routes handled by AuthController
$app->router->get('/customer-sign-up', [AuthController::class, 'customerSignUp']);
$app->router->post('/customer-sign-up', [AuthController::class, 'customerSignUp']);
$app->router->get('/technician-sign-up', [AuthController::class, 'technicianSignUp']);
$app->router->post('/technician-sign-up', [AuthController::class, 'technicianSignUp']);
$app->router->get('/service-centre-sign-up', [AuthController::class, 'serviceCentreSignup']);
$app->router->post('/service-centre-sign-up', [AuthController::class, 'serviceCentreSignup']);
$app->router->get('/service-centre-login', [AuthController::class, 'serviceCentreLogin']);
$app->router->post('/service-centre-login', [AuthController::class, 'serviceCentreLogin']);

$app->run();

function show($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
