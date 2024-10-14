<?php

require __DIR__ . "/../vendor/autoload.php";

$id = new \Ramsey\Uuid\UuidFactory();

$transaction = new \App\Transaction(12, "Description");

echo $id->uuid4();

echo '<br>';

var_dump($transaction);