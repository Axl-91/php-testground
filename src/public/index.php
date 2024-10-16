<?php

require __DIR__ . "/../vendor/autoload.php";

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

$uuidFactory = new \Ramsey\Uuid\UuidFactory();

$id = $uuidFactory->uuid4();

$transaction = new \App\Transaction(12, "Basic Transaction");

require VIEWS_PATH . 'home.php';