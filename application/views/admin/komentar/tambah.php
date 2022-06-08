<?php $this->load->view('admin/template/header');?>
<?php $this->load->view('admin/template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dath Kelola Komentar</a></div>
        <div class="breadcrumb-item">Tambah Kelola Komentar</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-kelola-komentar/'.$id_destinasi); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Tambah Kelola Komentar</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="hidden" name="id_destinasi" value="<?= $id_destinasi ?>">
                  <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>" required="">
                  <?= form_error('nama', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control" value="<?= set_value('email'); ?>" required="">
                  <?= form_error('email', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Website</label>
                  <input type="text" name="website" class="form-control" value="<?= set_value('website'); ?>" required="">
                  <?= form_error('website', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Komentar</label>
                  <textarea type="text" name="komentar" class="form-control"><?= set_value('komentar'); ?></textarea>
                  <?= form_error('komentar', '<span class="text-danger small">', '</span>'); ?>
                </div>

              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('kelola-komentar/'.$id_destinasi);?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="reset" class="btn btn-danger"><i class="fa fa-sync"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('admin/template/footer');?>