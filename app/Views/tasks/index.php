<!-- app/Views/tasks/index.php -->
<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Tugas</h3>
        </div>
        <div class="card-body">
          <table id="taskTable" class="table table-bordered table-striped">
            <!-- Tabel daftar tugas -->
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  $(document).ready(function() {
    // Inisialisasi DataTable
    var table = $('#taskTable').DataTable({
      ajax: {
        url: '<?= base_url('tasks/fetchTasks') ?>', // URL untuk mengambil data tugas
        dataSrc: ''
      },
      columns: [
        { data: 'judul' },
        { 
          data: 'status',
          render: function(data) {
            return data ? 'Selesai' : 'Belum Selesai';
          }
        },
        {
          data: null,
          render: function(data, type, row) {
            // Tombol aksi untuk edit dan hapus
            return '<a href="<?= base_url('tasks/edit/') ?>' + data.id + '" class="btn btn-primary btn-sm">Edit</a> ' +
                   '<button class="btn btn-danger btn-sm delete-btn" data-id="' + data.id + '">Hapus</button>';
          }
        }
      ]
    });

    // Event handling untuk tombol hapus
    $(document).on('click', '.delete-btn', function() {
      var taskId = $(this).data('id');
      if (confirm('Apakah Anda yakin ingin menghapus tugas ini?')) {
        // Panggil fungsi untuk menghapus tugas
        deleteTask(taskId);
      }
    });

    // Event handling untuk checkbox status
    $(document).on('change', '.status-checkbox', function() {
      var taskId = $(this).data('id');
      var status = $(this).is(':checked') ? 1 : 0;
      
      // Panggil fungsi untuk mengubah status tugas
      updateStatus(taskId, status);
    });

    // Fungsi untuk mengubah status tugas menggunakan Ajax
    function updateStatus(taskId, status) {
      $.ajax({
        url: '<?= base_url('tasks/updateStatus/') ?>' + taskId,
        method: 'POST',
        data: { status: status },
        success: function(response) {
          // Refresh tabel tugas setelah berhasil memperbarui status tugas
          table.ajax.reload();
        }
      });
    }

    // Fungsi untuk menghapus tugas menggunakan Ajax
    function deleteTask(taskId) {
      $.ajax({
        url: '<?= base_url('tasks/delete/') ?>' + taskId,
        method: 'POST',
        success: function(response) {
          // Refresh tabel tugas setelah berhasil menghapus tugas
          table.ajax.reload();
        }
      });
    }
  });
</script>

<?= $this->endSection() ?>
