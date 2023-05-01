<?php require_once('template/landing/header_no_promo.php'); ?>
<!-- fashion section start -->
<div class="fashion_section">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <h1 class="fashion_taital mt-5">Buat Pesanan</h1>
                    <div class="fashion_section_2">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <form method="post" action="admin/process/order.php">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input id="name" name="nama" type="text" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="product">Pesanan</label>
                                        <div>
                                            <select id="product" name="pakaian_id" class="custom-select" required="required">
                                                <option disabled selected>-- Pilih Produk --</option>
                                                <?php foreach ($productModel->findAll() as $pakaian) : ?>
                                                    <option value="<?php echo $pakaian->id ?>"><?php echo $pakaian->nama ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Jumlah Pesanan</label>
                                        <input id="quantity" name="quantity" type="number" class="form-control" required="required">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="form-group">
                                            <button name="create_order" type="submit" class="btn btn-primary">Buat Pesanan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once('template/landing/footer.php') ?>