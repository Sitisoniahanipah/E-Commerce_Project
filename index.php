<?php require_once('template/landing/header.php') ?>
<!-- fashion section start -->
<div class="fashion_section">
   <div id="main_slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="container my-5 py-5">
               <h1 class="fashion_taital">Pakaian Pria & Wanita</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <?php foreach ($productModel->findAll() as $pakaian) : ?>
                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text"><?php echo $pakaian->nama ?></h4>
                              <p class="price_text">Harga <span style="color: #262626;">Rp. <?php echo $pakaian->harga ?></span></p>
                              <div class="tshirt_img"><img src="admin/uploads/<?php echo $pakaian->image; ?>"></div>
                              <div class="btn_main">
                                 <div class="buy_bt"><a href="#">Pesan Sekarang</a></div>
                                 <div class="seemore_bt"><a href="detail.php?id=<?php echo $pakaian->id ?>">Selengkapnya</a></div>
                              </div>
                           </div>
                        </div>
                     <?php endforeach; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
         <i class="fa fa-angle-left"></i>
      </a>
      <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
         <i class="fa fa-angle-right"></i>
      </a>
   </div>
</div>


<?php require_once('template/landing/footer.php') ?>