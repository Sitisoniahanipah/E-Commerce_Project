<?php require_once('../template/admin/header.php');
$tipe = $typeProductModel->find($_GET['id']);
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jenis Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Ubah Jenis Produk</li>
        </ol>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

                        <form method="post" action="process/type.php">
                            <input type="hidden" name="id" value="<?php echo $tipe->id ?>">
                            <div class="form-group">
                                <label for="tipe">Nama Jenis Produk</label>
                                <input id="tipe" name="tipe" type="text" required="required" class="form-control" value="<?php echo $tipe->tipe ?>">
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button name="type_update" type="submit" class="btn btn-primary">Ubah Jenis Produk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once('../template/admin/footer.php') ?>