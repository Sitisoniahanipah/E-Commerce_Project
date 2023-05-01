<?php
require_once('../bootstrap.php');

if (isset($_POST['product_create'])) {
    if ($productModel->productInsert($_POST['nama'], $_POST['ukuran'], $_POST['warna'], $_POST['stok'], $_POST['harga'], $_POST['tipe_pakaian_id'], $_FILES['foto'])) {
        header('Location: ../product.php');
    } else {
        die('Error');
    }
} elseif (isset($_POST['product_update'])) {
    if ($productModel->productUpdate($_POST['id'], $_POST['nama'], $_POST['ukuran'], $_POST['warna'], $_POST['stok'], $_POST['harga'], $_POST['tipe_pakaian_id'], $_FILES['foto'])) {
        header('Location: ../product.php');
    } else {
        die('Error');
    }
} elseif (isset($_POST['product_delete'])) {
    if ($productModel->productDelete($_POST['id'])) {
        header('Location: ../product.php');
    } else {
        die('Error');
    }
}
