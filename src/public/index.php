<?php

use Dotenv\Dotenv;
use App\Router;
use App\Controllers\HomeController;
use App\App;

require_once __DIR__ . "/../vendor/autoload.php";

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

$dotenv = Dotenv::createImmutable($root);
$dotenv->load();

$router = new Router;

$router
    ->get("/", [HomeController::class, "index"]);

$app = new App(
    $router,
    [
        "uri" => $_SERVER["REQUEST_URI"],
        "method" => strtolower($_SERVER["REQUEST_METHOD"])
    ]
);

$app->run();