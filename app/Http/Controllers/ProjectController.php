<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Nanti, data ini akan diambil dari database.
        // Untuk sekarang, kita buat data contoh di sini.
        $projects = [
            ['id' => 1, 'name' => 'Wordpress Plugin Update', 'start_date' => 'Nov 4, 2024', 'deadline' => 'Des 25, 2024', 'director' => 'Athena Cyntia', 'level' => 'Low', 'status' => 'Running'],
            ['id' => 2, 'name' => 'Wordpress Plugin Update', 'start_date' => 'Nov 4, 2024', 'deadline' => 'Des 25, 2024', 'director' => 'Athena Cyntia', 'level' => 'High', 'status' => 'Maintenance'],
            ['id' => 3, 'name' => 'Wordpress Plugin Update', 'start_date' => 'Nov 4, 2024', 'deadline' => 'Des 25, 2024', 'director' => 'Athena Cyntia', 'level' => 'High', 'status' => 'Running'],
            ['id' => 4, 'name' => 'Wordpress Plugin Update', 'start_date' => 'Nov 4, 2024', 'deadline' => 'Des 25, 2024', 'director' => 'Athena Cyntia', 'level' => 'High', 'status' => 'Maintenance'],
            ['id' => 5, 'name' => 'Wordpress Plugin Update', 'start_date' => 'Nov 4, 2024', 'deadline' => 'Des 25, 2024', 'director' => 'Athena Cyntia', 'level' => 'Medium', 'status' => 'To do'],
            ['id' => 6, 'name' => 'Wordpress Plugin Update', 'start_date' => 'Nov 4, 2024', 'deadline' => 'Des 25, 2024', 'director' => 'Athena Cyntia', 'level' => 'High', 'status' => 'To do'],
        ];

        return view('project.index', ['project' => $projects]);
    }

    // Kita juga tambahkan method 'create' untuk link tombol "+ Create project"
    // Biarkan kosong untuk sekarang
    public function create()
    {
        // Nanti akan menampilkan form untuk membuat proyek baru
        return 'Halaman untuk membuat proyek baru.';
    }
}