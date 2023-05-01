<?php require_once('../template/admin/header.php'); ?>

<?php if (isset($_GET['id'])) : ?>
    <?php $pakaianType = $orderModel->find($_GET['id']) ?>
    <div class="container-fluid px-3">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="../assets/landing/images/tshirt-img.png" alt="">
                            </div>
                            <div class="col-md-12">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Tipe:</div>
                                            <span><?php echo $pakaianType->tipe ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="type_product.php" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pesanan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Pesanan</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="m-0">
                            <i class="fas fa-table me-1"></i>
                            Data Pesanan
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Pakaian</th>
                                <th>Quantity</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $number = 1;
                            foreach ($orderModel->findAll() as $pesanan) : ?>
                                <tr>
                                    <td><?php echo $number; ?></td>
                                    <td><?php echo $pesanan->tanggal ?></td>
                                    <td><?php echo $pesanan->nama ?></td>
                                    <td><?php echo $pesanan->pakaian ?></td>
                                    <td><?php echo $pesanan->quantity ?></td>
                                    <td><?php echo $pesanan->alamat ?></td>
                                </tr>
                            <?php
                                $number++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
<?php endif; ?>
<?php require_once('../template/admin/footer.php') ?>