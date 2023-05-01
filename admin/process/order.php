<?php
require_once('../bootstrap.php');

if (isset($_POST['create_order'])) {
    if ($orderModel->orderInsert($_POST['pakaian_id'], $_POST['quantity'], $_POST['nama'], $_POST['alamat'])) {
        header('Location: ' . LANDING_PATH);
    } else {
        echo 'error';
        die();
    }
}
