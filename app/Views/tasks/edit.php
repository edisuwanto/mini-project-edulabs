<!-- app/Views/tasks/edit.php -->
<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Tugas</h3>
              </div>
              <div class="card-body">
                <!-- Form untuk mengedit tugas -->
                <form action="<?= base_url('tasks/update/' . $task['id']) ?>" method="post">
                  <div class="form-group">
                    <label for="judul">Judul Tugas</label>
                    <input type="text" name="judul" id="judul" class="form-control" value="<?= $task['judul'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="status">Status Tugas</label>
                    <select name="status" id="status" class="form-control" required>
                      <option value="0" <?php echo ($task['status'] == 0) ? 'selected' : ''; ?>>Belum Selesai</option>
                      <option value="1" <?php echo ($task['status'] == 1) ? 'selected' : ''; ?>>Selesai</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?= $this->endSection() ?>
