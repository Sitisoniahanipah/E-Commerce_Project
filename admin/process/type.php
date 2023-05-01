<?php
require_once('../bootstrap.php');

if (isset($_POST['type_create'])) {
    if ($typeProductModel->typeProductInsert($_POST['tipe'])) {
        header("Location: ../type_product.php");
    } else {
        die('Error');
    }
} elseif (isset($_POST['type_update'])) {
    if ($typeProductModel->typeProductUpdate($_POST['id'], $_POST['tipe'])) {
        header("Location: ../type_product.php");
    } else {
        die('Error');
    }
} elseif (isset($_POST['type_delete'])) {
    if ($typeProductModel->typeProductDelete($_POST['id'])) {
        header("Location: ../type_product.php");
    } else {
        die('Error');
    }
}
