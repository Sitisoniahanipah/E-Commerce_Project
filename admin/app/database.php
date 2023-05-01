<?php

$dsn = "mysql:dbname=" . DB_NAME . ";host=127.0.0.1";

try {
    $dbh = new PDO($dsn, DB_USER, DB_PASS);
} catch (\Exception $e) {
    die($e->getMessage());
}
