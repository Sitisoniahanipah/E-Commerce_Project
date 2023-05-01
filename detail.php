<?php
require_once('template/landing/header_no_promo.php');
$pakaian = $productModel->find($_GET['id']);
?>
<!-- fashion section start -->
<div class="fashion_section">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <h1 class="fashion_taital mt-5"><?php echo $pakaian->nama ?></h1>
                    <div class="fashion_section_2">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="admin/uploads/<?php echo $pakaian->image; ?>" alt="">
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="font-weight-bold">Nama:</div>
                                                            <span><?php echo $pakaian->nama ?></span>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="font-weight-bold">Ukuran:</div>
                                                            <span><?php echo $pakaian->ukuran ?></span>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="font-weight-bold">Warna:</div>
                                                            <span><?php echo $pakaian->warna ?></span>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="font-weight-bold">Stok:</div>
                                                            <span><?php echo $pakaian->stok ?></span>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="font-weight-bold">Harga:</div>
                                                            <span><?php echo $pakaian->harga ?></span>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="font-weight-bold">Tipe:</div>
                                                            <span><?php echo $pakaian->tipe ?></span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer justify-content-end d-flex">
                                        <a href="order.php" class="btn btn-primary">Pesan <strong><?php echo $pakaian->nama ?></strong></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once('template/landing/footer.php') ?>