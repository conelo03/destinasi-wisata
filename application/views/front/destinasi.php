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
        <h2>Destinasi <?= isset($nama_kategori) ? $nama_kategori : '' ?></h2>

      </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- Blog Section -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12">
            <div class="sidebar">

              <!-- sidebar search formn-->
              <h3 class="sidebar-title">Cari Destinasi</h3>
              <div class="sidebar-item search-form">
                <form action="<?= base_url('Destinasi') ?>" method="POST">
                  <input type="text" name="keyword" value="<?= $keyword ?>">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div>
              <!-- End sidebar search formn-->

              <!-- <h3 class="sidebar-title">Kategori</h3>
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

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                <?php foreach ($recent_destinasi as $key): ?>
                <div class="post-item clearfix">
                  <img src="<?= base_url('assets/upload/gambar/'.$key['gambar']) ?>" alt="">
                  <h4><a href="<?= base_url('detail-destinasi/'.$key['id_destinasi']) ?>"><?= $key['judul'] ?></a></h4>
                  <time datetime="<?= date('Y-m-d', strtotime($key['datetime'])) ?>"><?= date('M d, Y', strtotime($key['datetime'])) ?></time>
                </div>
                <?php endforeach;?>

              </div> -->

            </div>
          </div> 
          <div class="col-lg-12 entries">
            <div class="row">
              <?php if ($destinasi) { ?>
                <?php foreach ($destinasi as $key): 
                  $image = explode('||', $key['gambar']);
                ?>
                <div class="col-md-3">
                  <article class="entry" style="height: 500px;">

                    <div class="entry-img">
                      <img src="<?= base_url('assets/upload/gambar/'.$image[0]) ?>" alt="" style="width: 100%; height: 200px;" class="img-fluid">
                    </div>

                    <h2 class="entry-title" style="font-size: 14px; height: 30px">
                      <a href="<?= base_url('detail-destinasi/'.$key['id_destinasi']) ?>"><?= $key['judul'] ?></a>
                    </h2>

                    <!-- <div class="entry-meta">
                      <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="<?= base_url('detail-destinasi/'.$key['id_destinasi']) ?>"><?= $key['author'] ?></a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="<?= base_url('detail-destinasi/'.$key['id_destinasi']) ?>"><time datetime="<?= date('Y-m-d', strtotime($key['datetime'])) ?>"><?= date('M d, Y', strtotime($key['datetime'])) ?></time></a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="<?= base_url('detail-destinasi/'.$key['id_destinasi']) ?>"><?= $key['jml_komen'] ?> Comments</a></li>
                      </ul>
                    </div> -->

                    <div class="entry-content">
                      <div style="text-align: justify; height: 170px;">
                        <?php
                            $result = str_replace("<br />", "", $key['konten']);
                            $arr = explode(" ", $result);
                            $limit = 15;
                            $new = [];

                            if (count($arr) > $limit) {
                                for($i = 0; $i < $limit; $i++) {
                                    array_push($new, $arr[$i]);
                                }
                            }

                            if($new) {
                                $new = implode(" ", $new);
                                echo $new; // Output : Rasang Beam Steal
                            }
                            else {
                                echo $key['konten'];
                            }
                        ?>
                      </div>
                        
                      <div class="read-more">
                        <a href="<?= base_url('detail-destinasi/'.$key['id_destinasi']) ?>">Read More</a>
                      </div>
                    </div>

                  </article><!-- End blog entry -->
                

                </div>
                <?php endforeach; ?>
              <?php } else { ?>
                Wisata tidak ditemukan.
              <?php } ?>
              
              
            </div>
            
            <!-- End blog entry -->

            <!-- Pagination -->
            <?= isset($nama_kategori) ? '' : $pagination ?>
            <!-- <div class="blog-pagination">
              <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div> -->
            <!-- End pagination -->

          </div>
          <!-- End blog entries list -->

          <!-- Blog Sidebar -->
          <!-- <div class="col-lg-4">

            
            <div class="sidebar">

              
              <h3 class="sidebar-title">Cari Destinasi</h3>
              <div class="sidebar-item search-form">
                <form action="<?= base_url('Destinasi') ?>" method="POST">
                  <input type="text" name="keyword" value="<?= $keyword ?>">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div>

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

            </div>

          </div> -->
          <!-- End blog sidebar -->

        </div>

      </div>
    </section>
    <!-- End Blog Section -->

  </main>
  <!-- End #main -->

<?php $this->load->view('front/template/footer');?>