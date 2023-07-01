<!-- app/Views/tasks/create.php -->
<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Tugas</h3>
              </div>
              <div class="card-body">
                <!-- Form untuk menambahkan tugas baru -->
                <form action="<?= base_url('tasks/store') ?>" method="post">
                  <div class="form-group">
                    <label for="judul">Judul Tugas</label>
                    <input type="text" name="judul" id="judul" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?= $this->endSection() ?>
