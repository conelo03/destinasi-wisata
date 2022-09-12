<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Destinasi - <?= $title ?></title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/front/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/front/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/front/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/front/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/front/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/front/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/vendor/izitoast/css/iziToast.min.css'?>"/>

  <!-- CSS Assets -->
  <link href="<?= base_url() ?>assets/front/css/style.css" rel="stylesheet">
  <style type="text/css">
    .star-cb-group {
      /* remove inline-block whitespace */
      font-size: 0;
      /* flip the order so we can use the + and ~ combinators */
      unicode-bidi: bidi-override;
      direction: rtl;
      /* the hidden clearer */
    }
    .star-cb-group * {
      font-size: 1rem;
    }
    .star-cb-group > input {
      display: none;
    }
    .star-cb-group > input + label {
      /* only enough room for the star */
      display: inline-block;
      overflow: hidden;
      text-indent: 9999px;
      width: 1.1em;
      white-space: nowrap;
      cursor: pointer;
    }
    .star-cb-group > input + label:before {
      display: inline-block;
      text-indent: -9999px;
      font-family: "Font Awesome 5 Free";
      content: "\f005";
      color: #888;
      font-weight: 900;
    }
    .star-cb-group > input:checked ~ label:before, .star-cb-group > input + label:hover ~ label:before, .star-cb-group > input + label:hover:before {
      font-family: "Font Awesome 5 Free";
      content: "\f005";
      color: orange;
      box-sizing: border-box;
      font-weight: 900;
    }
    .star-cb-group > .star-cb-clear + label {
      text-indent: -9999px;
      width: .5em;
      margin-left: -.5em;
    }
    .star-cb-group > .star-cb-clear + label:before {
      width: .5em;
    }
    .star-cb-group:hover > input + label:before {
      font-family: "Font Awesome 5 Free";
      content: "\f005";
      color: #888;
      text-shadow: none;
      font-weight: 900;
    }
    .star-cb-group:hover > input + label:hover ~ label:before, .star-cb-group:hover > input + label:hover:before {
      font-family: "Font Awesome 5 Free";
      content: "\f005";
      color: orange;
      box-sizing: border-box;
      font-weight: 900;
    }
  </style>

</head>

<body>

  <!-- Header -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?php base_url() ?>" class="logo d-flex align-items-center">
        <img src="<?= base_url('assets/front/img/logo.png') ?>" class="logo" />
        <span>Wisata Kota Beriman</span>
      </a>

      <!-- Navbar -->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto <?= $title == 'Home' ? 'active' : '' ?>" href="<?= base_url('home') ?>">Beranda</a></li>
          <li class="dropdown"><a href="<?= base_url('destinasi') ?>" class="<?= $title == 'Destinasi' ? 'active' : '' ?>"><span>Destinasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <?php foreach ($kategori as $key) { 
              $jml_des = $this->db->get_where('tb_destinasi', ['id_kategori' => $key['id_kategori']])->num_rows();
              $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            ?>
              <li><a href="<?= base_url('Destinasi/index/'.$page.'/'.$key['id_kategori']) ?>"><?= $key['nama_kategori'] ?> <span>(<?= $jml_des ?>)</span></a></li>
            <?php } ?>
            </ul>
          </li>
          <li><a class="nav-link scrollto <?= $title == 'Tentang' ? 'active' : '' ?>" href="<?= base_url('about') ?>">Tentang</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- End Navbar -->

    </div>
  </header>
  <!-- End Header -->