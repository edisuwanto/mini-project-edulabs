<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Controller;

class Tasks extends Controller
{
    public function index()
    {
        $taskModel = new TaskModel();
        $tasks = $taskModel->getTasks();

        // Kirim data tugas ke view
        return view('tasks/index', ['tasks' => $tasks]);
    }

    public function create()
    {
        // Tampilkan halaman tambah tugas
        return view('tasks/create');
    }

    public function store()
    {
        // Validasi input

        // Ambil data dari form
        $judul = $this->request->getPost('judul');
        $status = $this->request->getPost('status');

        // Simpan tugas ke database
        $data = [
            'judul' => $judul,
            'status' => $status,
        ];
        $taskModel = new TaskModel();
        $taskModel->createTask($data);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->to('/tasks')->with('status', 'Tugas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->getTask($id);

        // Tampilkan halaman edit tugas dengan data tugas
        return view('tasks/edit', ['task' => $task]);
    }

    public function update($id)
    {
        // Validasi input

        // Ambil data dari form
        $judul = $this->request->getPost('judul');
        $status = $this->request->getPost('status');

        // Update tugas di database
        $data = [
            'judul' => $judul,
            'status' => $status,
        ];
        $taskModel = new TaskModel();
        $taskModel->updateTask($id, $data);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->to('/tasks')->with('status', 'Tugas berhasil diupdate.');
    }

    public function delete($id)
    {
        $taskModel = new TaskModel();
        $taskModel->deleteTask($id);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->to('/tasks')->with('status', 'Tugas berhasil dihapus.');
    }
}
