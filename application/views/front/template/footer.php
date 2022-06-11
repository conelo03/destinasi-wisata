<!-- Footer -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="#" class="logo d-flex align-items-center">
              <span>Disporapar Kota Balikpapan.</span>
            </a>
            <p>DPOP Kota Balikpapan adalah instansi pemerintahan yang bergerak dibidang kepemudaan, keolahragaan dan kepariwisataan.</p>
            <div class="social-links mt-3">
              <a href="https://twitter.com/porabudpar_bpn?s=21&t=0N2lBhyBXd5Ty8JZ_zt3bA" target="_target" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="https://www.facebook.com/disporaparkotabpn" target="_target" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="https://instagram.com/disporapar_balikpapan?igshid=YmMyMTA2M2Y=" target="_target" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="mailto:dpokp.balikpapan@gmail.com" target="_blank" class="linkedin"><i class="bi bi-envelope"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Menu Kami</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('home') ?>">Beranda</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('destinasi') ?>">Destinasi</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('about') ?>">Tentang</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Kategori</h4>
            <ul>
              <?php 
              $kategori = $this->db->select('*')->from('tb_kategori')->get()->result_array();
              foreach ($kategori as $key) { 
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
              ?>
                <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('Destinasi/index/'.$page.'/'.$key['id_kategori']) ?>"><?= $key['nama_kategori'] ?></a></li>
              <?php } ?>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Kontak Kami</h4>
            <p>
              Jl. Marsma R. Iswahyudi No.121, Gn. Bahagia, Kecamatan Balikpapan Selatan, Kota Balikpapan, Kalimantan Timur 76114.<br/>
              <strong>Telepon</strong>: (0542) 761111<br>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8384468945037!2d116.87341601475389!3d-1.2698573990737982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df146963aafe5f1%3A0x6c2f292a791828a5!2sDISPORAPAR!5e0!3m2!1sen!2sid!4v1654874509962!5m2!1sen!2sid" max-width="306" max-height="306" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>UI Blog</span></strong>. All Rights Reserved
      </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>assets/front/vendor/purecounter/purecounter.js"></script>
  <script src="<?= base_url() ?>assets/front/vendor/aos/aos.js"></script>
  <script src="<?= base_url() ?>assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/front/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url() ?>assets/front/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>assets/front/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/front/vendor/php-email-form/validate.js"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/vendor/izitoast/js/iziToast.min.js'?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>assets/front/js/main.js"></script>
  <script type="text/javascript">
        $(document).ready(function() {
            $("#rating .rate").click(function() {

                $.ajax({
                    url: "./proses.php",
                    method: "POST",
                    data: {
                        rate: $(this).val()
                    },
                    success: function(obj) {
                        var obj = obj.split('|');

                        $('#star' + obj[0]).attr('checked');
                        $('#hasil').html('Rating ' + obj[1] + '.0');
                        $('#star').html(obj[2]);
                        alert("terima kasih atas penilaian anda");
                    }
                });
            });
        });
    </script>
    <?php if($this->session->flashdata('msg')=='success'):?>
    <script type="text/javascript">
      iziToast.success({
          title: 'Sukses!',
          message: 'Data berhasil disimpan!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
    <?php elseif($this->session->flashdata('msg')=='sent-comment-success'):?>
      <script type="text/javascript">
        iziToast.success({
            title: 'Success!',
            message: 'Thank For Your Comment!',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        });
      </script>
    <?php elseif($this->session->flashdata('msg')=='sent-comment-error'):?>
      <script type="text/javascript">
        iziToast.error({
            title: 'Failed!',
            message: 'Comment Failed to Sent!',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        });
      </script>
    <?php endif; ?>

</body>

</html>