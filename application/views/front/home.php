<?php $this->load->view('front/template/header');?>

  <!-- Section -->
  <section class="hero d-flex align-items-center">

    <div class="container">
      <div class="row gy-4">

        <div class="col-lg-12" data-aos="fade-up">
          <div class="about-details-slider swiper">
            <div class="swiper-wrapper" align="center">
              <div class="swiper-slide">
                <img src="<?= base_url() ?>assets/front/img/about/about-1.jpg" style="height: 600px; width: 100%;" alt="">
              </div>

              <div class="swiper-slide">
                <img src="<?= base_url() ?>assets/front/img/about/about-2.jpg" style="height: 600px; width: 100%;" alt="">
              </div>

              <div class="swiper-slide">
                <img src="<?= base_url() ?>assets/front/img/about/about-3.jpg" style="height: 600px; width: 100%;" alt="">
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

      </div>
    </div>

  </section><!-- End Section -->

  <!-- Main -->
  <main id="main">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>Cari Destinasi</h4>
          </div>
          <div class="col-lg-6">
            <form action="<?= base_url('Destinasi') ?>" method="post">
              <input type="text" name="keyword"><input type="submit" value="Cari">
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- 3 Most Popular Blogs -->
    <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Destinasi</h2>
          <p>Tiga Destinasi Terpopuler
          </p>
        </header>

        <div class="row">
          <?php
            foreach ($destination as $d) {  
              $image = explode('||', $d['gambar']);
            ?>
              <div class="col-lg-4">
                <div class="post-box">
                  <div class="post-img"><img src="<?= base_url('assets/upload/gambar/'.$image[0]) ?>" class="img-fluid" style="width: 100%; height: 200px;" alt=""></div>
                  <span class="post-date"><?= date('F Y', strtotime($d['datetime'])) ?></span>
                  <h3 class="post-title"><?= $d['judul'] ?></h3>
                  <a href="<?= base_url('detail-destinasi/'.$d['id_destinasi']) ?>" class="readmore stretched-link mt-auto"><span>Read More</span><i
                      class="bi bi-arrow-right"></i></a>
                </div>
              </div>
          <?php  }
          ?>

        </div>

      </div>

    </section>
    <!-- End 3 Most Popular Blogs -->

  </main>
  <!-- End main -->

<?php $this->load->view('front/template/footer');?>