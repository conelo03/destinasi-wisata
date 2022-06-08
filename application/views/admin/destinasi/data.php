<?php $this->load->view('admin/template/header');?>
<?php $this->load->view('admin/template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Kelola Blog</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Kelola Blog</h4>
              
              <div class="card-header-action">
                <a href="<?= base_url('tambah-destinasi');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
              
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-jabatan">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 50px;">#</th>
                      <th style="width: 150px;">Tanggal</th>
                      <th>Tempat Wisata</th>
                      <th>Kategori</th>
                      <th>Deskripsi</th>
                      <th style="width: 150px;">Author</th>
                      <th style="width: 80px;">Status</th>
                      <th class="text-center" style="width: 260px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($destinasi as $u):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['datetime'];?></td>
                      <td><?= $u['judul'];?></td>
                      <td><?= $u['id_kategori'];?></td>
                      <td><?= substr($u['konten'], 0, 20).'...';?></td>
                      <td><?= $u['author'];?></td>
                      <td><?= $u['status'];?></td>
                      <td class="text-center">
                        <a href="<?= base_url('kelola-komentar/'.$u['id_destinasi']);?>" class="btn btn-light"><i class="fa fa-eye"></i> Komentar</a>
                        <a href="<?= base_url('edit-destinasi/'.$u['id_destinasi']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-destinasi/'.$u['id_destinasi']); ?>';"><i class="fa fa-trash"></i> Delete</button>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('admin/template/footer');?>