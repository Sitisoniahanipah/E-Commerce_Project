<?php

define('APP_NAME', 'Clothing Store MS');
define('DB_NAME', 'sonia_store');
define('DB_USER', 'root');
define('DB_PASS', '');
define('LANDING_PATH', '../../index.php');


$dir = __DIR__;
$dir = explode('/', $dir);
array_pop($dir);
$dir = implode('/', $dir);
define('UPLOADED_PATH', $dir);
