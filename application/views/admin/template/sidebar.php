<?php
$id_pengguna = $this->session->userdata('id_pengguna');
$get_user = $this->db->get_where('tb_pengguna', ['id_pengguna' => $id_pengguna])->row_array();
?>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-auto">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url('assets/img/profile/user.png'); ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $get_user['nama_pengguna'] ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?= base_url('setting');?>" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Edit Akun
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item has-icon text-danger" data-confirm="Logout|Anda yakin ingin keluar?" data-confirm-yes="document.location.href='<?= base_url('logout'); ?>';"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Destinasi Wisata</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">DES</a>
          </div>
          <?php
            $judul = explode(' ', $title);
          ?>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="<?= $title == 'Dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('dashboard');?>"><i class="fas fa-circle"></i> <span>Dashboard</span></a></li>  

            <li class="menu-header">Data Master</li>
      
            <li class="<?= $title == 'Kelola Pengguna' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('pengguna');?>"><i class="fas fa-circle"></i> <span>Kelola Pengguna</span></a></li> 
            
            <li class="<?= $title == 'Kelola Kategori' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('kategori');?>"><i class="fas fa-circle"></i> <span>Kelola Kategori</span></a></li> 

            <li class="menu-header">Destinasi</li>

            <li class="<?= $title == 'Tambah Destinasi' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('tambah-destinasi');?>"><i class="fas fa-circle"></i> <span>Tambah Destinasi</span></a></li> 
            <li class="<?= $title == 'Kelola Destinasi' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('kelola-destinasi');?>"><i class="fas fa-circle"></i> <span>Kelola Destinasi</span></a></li> 
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <button class="btn btn-danger btn-lg btn-block btn-icon-split" data-confirm="Logout|Anda yakin ingin keluar?" data-confirm-yes="document.location.href='<?= base_url('logout'); ?>';"><i class="fa fa-sign-out-alt"></i> Logout</button>
          </div>
        </aside>
      </div>
      