<?php $this->load->view('admin/template/header');?>
<?php $this->load->view('admin/template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Biodata</a></div>
        <div class="breadcrumb-item">Kelola biodata</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('kelola-biodata/'); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Kelola Biodata</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <img src="<?= base_url('assets/upload/biodata/'.$b['baner_depan']) ?>" width="300px">
                </div>
                <div class="form-group">
                  <label>Baner Depan</label>
                  <input type="hidden" name="baner_depan_old" class="form-control" value="<?= $b['baner_depan']; ?>" required="">
                  <input type="file" name="baner_depan" class="form-control" value="<?= set_value('baner_depan'); ?>" >
                  <?= form_error('baner_depan', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Jumlah Klien</label>
                  <input type="number" name="jml_klien" class="form-control" value="<?= set_value('jml_klien', $b['jml_klien']); ?>" required="">
                  <?= form_error('jml_klien', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Jumlah Project</label>
                  <input type="number" name="jml_project" class="form-control" value="<?= set_value('jml_project', $b['jml_project']); ?>" required="">
                  <?= form_error('jml_project', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Jumlah Jam Support</label>
                  <input type="number" name="jml_jam_support" class="form-control" value="<?= set_value('jml_jam_support', $b['jml_jam_support']); ?>" required="">
                  <?= form_error('jml_jam_support', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Jumlah Pekerja</label>
                  <input type="number" name="jml_pekerja" class="form-control" value="<?= set_value('jml_pekerja', $b['jml_pekerja']); ?>" required="">
                  <?= form_error('jml_pekerja', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>
              <div class="card-footer text-right">
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