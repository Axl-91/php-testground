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

$config = [
    "host" => $_ENV["DB_HOST"],
    "user" => $_ENV["DB_USER"],
    "pass" => $_ENV["DB_PASS"],
    "database" => $_ENV["DB_DATABASE"],
    "driver" => $_ENV["DB_DRIVER"] ?? "mysql"
];

$server_request = [
    "uri" => $_SERVER["REQUEST_URI"],
    "method" => strtolower($_SERVER["REQUEST_METHOD"])
];

$router = new Router;

$router
    ->get("/", [HomeController::class, "index"]);

$app = new App(
    $router,
    $server_request,
    $config
);

$app->run();