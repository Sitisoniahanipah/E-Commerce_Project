<?php require_once('../template/admin/header.php'); ?>

<?php if (isset($_GET['id'])) : ?>
    <?php $pakaianType = $typeProductModel->find($_GET['id']) ?>
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
            <h1 class="mt-4">Jenis Produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Jenis Produk</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="m-0">
                            <i class="fas fa-table me-1"></i>
                            Data Jenis Produk Pakaian
                        </p>
                        <a href="create_type_product.php" class="btn btn-primary">Tambah Jenis Produk</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipe</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $number = 1;
                            foreach ($typeProductModel->findAll() as $pakaian) : ?>
                                <tr>
                                    <td><?php echo $number; ?></td>
                                    <td><?php echo $pakaian->tipe ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="type_product.php?id=<?php echo $pakaian->id ?>" class="btn btn-warning">View</a>
                                            <a href="update_type_product.php?id=<?php echo $pakaian->id ?>" class="btn btn-primary mx-2">Edit</a>
                                            <form action="process/type.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $pakaian->id ?>">
                                                <button type="submit" name="type_delete" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
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