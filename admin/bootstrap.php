<?php

// Config
require_once('app/config.php');
require_once('app/database.php');

// Class
require_once('class/Order.php');
require_once('class/Product.php');
require_once('class/TypeProduct.php');

// Init
$orderModel = new Order($dbh);
$typeProductModel = new TypeProduct($dbh);
$productModel = new Product($dbh);
