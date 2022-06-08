<?php $this->load->view('admin/template/header');?>
<?php $this->load->view('admin/template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dath Kelola Destinasi</a></div>
        <div class="breadcrumb-item">Edit Kelola Destinasi</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-destinasi/'.$b['id_destinasi']); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Edit Destinasi</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Tempat Wisata</label>
                  <input type="text" name="judul" class="form-control" value="<?= set_value('judul', $b['judul']); ?>" required="">
                  <?= form_error('judul', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select name="id_kategori" class="form-control">
                    <option disabled="" selected="">--Pilih Kategori--</option>
                    <?php
                      foreach ($kategori as $k) { ?>
                        <option value="<?= $k['id_kategori'] ?>" <?= set_value('id_kategori', $b['id_kategori']) == $k['id_kategori'] ? 'selected' : ''; ?>><?= $k['nama_kategori'] ?></option>
                    <?php  }
                    ?>
                  </select>
                  <?= form_error('id_kategori', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea type="text" name="konten" class="form-control ckeditor" id="ckeditor"><?= set_value('konten', str_replace('<br />', '', $b['konten'])); ?></textarea>
                  <?= form_error('konten', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" value="<?= set_value('alamat', $b['alamat']); ?>" required="">
                  <?= form_error('alamat', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>URL Google Maps</label>
                  <input type="text" name="url_google_maps" class="form-control" value="<?= set_value('url_google_maps', $b['url_google_maps']); ?>" required="">
                  <?= form_error('url_google_maps', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Foto / Gambar</label>
                  <input type="hidden" name="gambar_old" class="form-control" value="<?= $b['gambar']; ?>" required="">
                  <input type="file" name="gambar[]" class="form-control" value="<?= set_value('gambar'); ?>" multiple>
                  <?= form_error('gambar', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label class="d-block">Status</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="publish" id="exampleRadios3" <?= set_value('status', $b['status']) == 'publish' ? 'checked' : '' ; ?> >
                    <label class="form-check-label" for="exampleRadios3">
                      Publish
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="draft" id="exampleRadios4" <?= set_value('status', $b['status']) == 'draft' ? 'checked' : '' ; ?> >
                    <label class="form-check-label" for="exampleRadios4">
                      Draft
                    </label>
                  </div>
                </div>
                <?= form_error('status', '<span class="text-danger small">', '</span>'); ?>
                
                <iframe src="<?= $b['url_google_maps'] ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>


              <div class="card-footer text-right">
                <a href="<?= base_url('kelola-destinasi');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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