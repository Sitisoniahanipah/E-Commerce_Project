<?php require_once('../template/admin/header.php'); ?>

<?php if (isset($_GET['id'])) : ?>
    <?php $pakaian = $productModel->find($_GET['id']) ?>
    <div class="container-fluid px-3">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="uploads/<?php echo $pakaian->image; ?>" alt="Gambar Pakaian" class="w-100">
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Nama:</div>
                                            <span><?php echo $pakaian->nama ?></span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Ukuran:</div>
                                            <span><?php echo $pakaian->ukuran ?></span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Warna:</div>
                                            <span><?php echo $pakaian->warna ?></span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Stok:</div>
                                            <span><?php echo $pakaian->stok ?></span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Harga:</div>
                                            <span><?php echo $pakaian->harga ?></span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Tipe:</div>
                                            <span><?php echo $pakaian->tipe ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="product.php" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Produk</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="m-0">
                            <i class="fas fa-table me-1"></i>
                            Data Produk Pakaian
                        </p>
                        <a href="create_product.php" class="btn btn-primary">Tambah produk</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Ukuran</th>
                                <th>Warna</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Tipe Pakaian</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productModel->findAll() as $pakaian) : ?>
                                <tr>
                                    <td><?php echo $pakaian->nama ?></td>
                                    <td><?php echo $pakaian->ukuran ?></td>
                                    <td><?php echo $pakaian->warna ?></td>
                                    <td><?php echo $pakaian->stok ?></td>
                                    <td>Rp. <?php echo $pakaian->harga ?></td>
                                    <td><?php echo $pakaian->tipe ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="product.php?id=<?php echo $pakaian->id ?>" class="btn btn-warning">View</a>
                                            <a href="update_product.php?id=<?php echo $pakaian->id ?>" class="btn btn-primary mx-2">Edit</a>
                                            <form action="process/product.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $pakaian->id ?>">
                                                <button type="submit" name="product_delete" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
<?php endif; ?>
<?php require_once('../template/admin/footer.php') ?>