<?php require_once('../template/admin/header.php');
$pakaian = $productModel->find($_GET['id']);
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Tambah Produk</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

                <form method="post" action="process/product.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $pakaian->id ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input id="nama" name="nama" type="text" required="required" class="form-control" value="<?php echo $pakaian->nama ?>">
                    </div>
                    <div class="form-group">
                        <label for="ukuran">Ukuran</label>
                        <input id="ukuran" name="ukuran" type="text" required="required" class="form-control" value="<?php echo $pakaian->ukuran ?>">
                    </div>
                    <div class="form-group">
                        <label for="warna">Warna</label>
                        <input id="warna" name="warna" type="text" required="required" class="form-control" value="<?php echo $pakaian->warna ?>">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input id="stok" name="stok" type="number" class="form-control" required="required" value="<?php echo $pakaian->stok ?>">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input id="harga" name="harga" type="number" class="form-control" value="<?php echo $pakaian->harga ?>">
                    </div>
                    <div class="form-group">
                        <label for="tipe_pakaian_id">Tipe</label>
                        <div>
                            <select id="tipe_pakaian_id" name="tipe_pakaian_id" class="custom-select" required="required">
                                <?php foreach ($typeProductModel->findAll() as $tipe) : ?>
                                    <?php if ($pakaian->tipe_id == $tipe->id) : ?>
                                        <option value="<?php echo $tipe->id ?>" selected><?php echo $tipe->tipe ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $tipe->id ?>"><?php echo $tipe->tipe ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga" class="form-label d-block">Foto</label>
                        <img src="uploads/<?php echo $pakaian->image; ?>" alt="" style="width: 140px;">
                    </div>
                    <div class="form-group">
                        <label for="foto">Ubah foto</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button name="product_update" type="submit" class="btn btn-primary">Ubah Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php require_once('../template/admin/footer.php') ?>