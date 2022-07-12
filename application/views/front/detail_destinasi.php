<?php $this->load->view('front/template/header');?>

  <!-- Main -->
  <main id="main">

    <!-- Breadcrumbs -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Beranda</a></li>
          <li>Destinasi</li>
        </ol>
        <h2><?= $destinasi['judul'] ?></h2>

      </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- Blog Single Section -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <!-- Blog entry -->
            <article class="entry entry-single">

              <div class="entry-img">
                <div class="row gy-4">

                  <div class="col-lg-12" data-aos="fade-up">
                    <div class="about-details-slider swiper">
                      <div class="swiper-wrapper" align="center">
                        <?php 
                        $images = explode('||', $destinasi['gambar']);
                        foreach ($images as $key) { ?>
                          <div class="swiper-slide">
                            <img src="<?= base_url('assets/upload/gambar/'.$key) ?>" style="height: 600px; width: 100%;" alt="">
                          </div>
                        <?php } ?>
                      </div>
                      <div class="swiper-pagination"></div>
                    </div>
                  </div>

                </div>
              </div>

              <h2 class="entry-title">
                <a href="<?= base_url('detail-destinasi/'.$destinasi['id_destinasi']) ?>"><?= $destinasi['judul'] ?></a>
              </h2>

              <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="<?= base_url('detail-destinasi/'.$destinasi['id_destinasi']) ?>"><?= $destinasi['author'] ?></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="<?= base_url('detail-destinasi/'.$destinasi['id_destinasi']) ?>"><time datetime="<?= date('Y-m-d', strtotime($destinasi['datetime'])) ?>"><?= date('M d, Y', strtotime($destinasi['datetime'])) ?></time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="<?= base_url('detail-destinasi/'.$destinasi['id_destinasi']) ?>"><?= $destinasi['jml_komen'] ?> Comments</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="<?= base_url('detail-destinasi/'.$destinasi['id_destinasi']) ?>"><?= $jml_pengunjung ?> Visitors</a></li>
                  </ul>
                </div>

              <div class="entry-content">
                <p>
                  <?= str_replace('<br />', '', $destinasi['konten']) ?>
                  Peta :<br/>
                  <iframe src="<?= $destinasi['url_google_maps'] ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </p>

              </div>

              <div class="entry-footer">
                <p style="margin-bottom: -8px; margin-bottom: 5px;">Rating</p>
                  <?php
                  for ($i = 0; $i < $rating; $i++) {
                      echo '<span class="fa fa-star checked"></span>';
                  }

                  for ($i = 5; $i > $rating; $i--) {
                      echo '<span class="fa fa-star"></span>';
                  }
                  ?>

                <br>
              </div>

            </article>
            <!-- End blog entry -->

            <div class="blog-comments">

              <h4 class="comments-count"><?= $destinasi['jml_komen'] ?> Comments</h4>

              <?php foreach ($komentar as $key): ?>
              <div id="comment-1" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>
                  <div>
                    <h5><a href=""><?= $key['nama'] ?></a> </h5>
                    <time datetime="<?= date('Y-m-d', strtotime($key['datetime'])) ?>"><?= date('M d, Y', strtotime($key['datetime'])) ?></time>
                    <?php
                    for ($i = 0; $i < $key['rating']; $i++) {
                        echo '<span class="fa fa-star checked"></span>';
                    }

                    for ($i = 5; $i > $key['rating']; $i--) {
                        echo '<span class="fa fa-star"></span>';
                    }
                    ?>
                    <p>
                      <?= $key['komentar'] ?>
                    </p>
                  </div>
                </div>
              </div><!-- End comment #1 -->
              <?php endforeach; ?>
              <!-- End comment #4 -->

              <!-- Leave A comment -->
              <div class="reply-form">
                <h4>Tinggalkan Komentar dibawah</h4>
                <br>
                <form action="<?= base_url('leave-comment/'.$destinasi['id_destinasi']) ?>" method="post">
                  <div class="row">
                    <div class="col form-group">
                      <input name="id_destinasi" type="hidden" value="<?= $destinasi['id_destinasi'] ?>">
                      <input name="nama" type="text" class="form-control" placeholder="Nama" required="">
                      <?= form_error('nama', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input name="email" type="text" class="form-control" placeholder="Email" required="">
                      <?= form_error('email', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="komentar" class="form-control" placeholder="Komentar" required=""></textarea>
                      <?= form_error('komentar', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <label for="">Berikan Penilaian</label><br>
                      <fieldset>
                        <span class="star-cb-group">
                          <input type="radio" id="rating-5" name="rating" value="5" />
                          <label for="rating-5">5</label>
                          <input type="radio" id="rating-4" name="rating" value="4" />
                          <label for="rating-4">4</label>
                          <input type="radio" id="rating-3" name="rating" value="3" />
                          <label for="rating-3">3</label>
                          <input type="radio" id="rating-2" name="rating" value="2" />
                          <label for="rating-2">2</label>
                          <input type="radio" id="rating-1" name="rating" value="1" />
                          <label for="rating-1">1</label>
                        </span>
                      </fieldset>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Kirim Komentar</button>

                </form>

              </div>
              <!-- Leave A comment -->

            </div>
            <!-- End blog comments -->

          </div><!-- End blog entries list -->

          <!-- Blog Sidebar -->
          <div class="col-lg-4">

            <!-- Sidebar -->
            <div class="sidebar">

              <!-- sidebar search formn-->
              <h3 class="sidebar-title">Cari Destinasi</h3>
              <div class="sidebar-item search-form">
                <form action="<?= base_url('Destinasi') ?>" method="POST">
                  <input type="text" name="keyword" >
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div>
              <!-- End sidebar search formn-->

              <!-- sidebar categories-->
              <h3 class="sidebar-title">Kategori</h3>
              <div class="sidebar-item categories">
                <ul>
                  <?php foreach ($kategori as $key) { 
                    $jml_des = $this->db->get_where('tb_destinasi', ['id_kategori' => $key['id_kategori']])->num_rows();
                    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                  ?>
                    <li><a href="<?= base_url('Destinasi/index/'.$page.'/'.$key['id_kategori']) ?>"><?= $key['nama_kategori'] ?> <span>(<?= $jml_des ?>)</span></a></li>
                  <?php } ?>
                  
                </ul>
              </div>
              <!-- End sidebar categories-->

              <!-- Sidebar recent posts-->
              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                <?php foreach ($recent_destinasi as $key): ?>
                <div class="post-item clearfix">
                  <img src="<?= base_url('assets/upload/gambar/'.$key['gambar']) ?>" alt="">
                  <h4><a href="<?= base_url('detail-destinasi/'.$key['id_destinasi']) ?>"><?= $key['judul'] ?></a></h4>
                  <time datetime="<?= date('Y-m-d', strtotime($key['datetime'])) ?>"><?= date('M d, Y', strtotime($key['datetime'])) ?></time>
                </div>
                <?php endforeach;?>

              </div>
              <!-- End sidebar recent posts-->

            </div>
            <!-- End sidebar -->

          </div>
          <!-- End blog sidebar -->

        </div>

      </div>
    </section>
    <!-- End Blog Single Section -->

  </main><!-- End #main -->

  <!-- Footer -->
<?php $this->load->view('front/template/footer');?>