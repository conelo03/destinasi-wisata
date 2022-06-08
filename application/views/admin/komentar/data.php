<?php $this->load->view('admin/template/header');?>
<?php $this->load->view('admin/template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Kelola Komentar</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Kelola Komentar</h4>
              
              <div class="card-header-action">
                <a href="<?= base_url('tambah-kelola-komentar/'.$id_destinasi);?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
              
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-jabatan">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 50px;">#</th>
                      <th style="width: 150px;">Tanggal</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Website</th>
                      <th>Komentar</th>
                      <th class="text-center" style="width: 160px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($komentar as $u):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['datetime'];?></td>
                      <td><?= $u['nama'];?></td>
                      <td><?= $u['email'];?></td>
                      <td><?= $u['website'];?></td>
                      <td><?= $u['komentar'];?></td>
                      <td class="text-center">
                        <a href="<?= base_url('edit-kelola-komentar/'.$id_destinasi.'/'.$u['id_komentar']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-kelola-komentar/'.$id_destinasi.'/'.$u['id_komentar']); ?>';"><i class="fa fa-trash"></i> Delete</button>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <a href="<?= base_url('kelola-destinasi');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('admin/template/footer');?>