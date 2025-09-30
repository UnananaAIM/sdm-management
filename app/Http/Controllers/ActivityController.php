<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User; // Pastikan Anda mengimpor model User

class ActivityController extends Controller
{
    /**
     * Menampilkan dashboard karyawan.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $users = User::all();

        // Data dummy untuk setiap user.
        $employeesData = $users->map(function ($user) {
            $workHoursPercentage = rand(45, 125); // Menghasilkan persentase acak, bisa lebih dari 100
            $roles = ['Copywriter', 'AI Developer', 'Content Creator', 'UX Designer', 'UI Desinger', 'Backend Engineer'];

            return (object) [
                'avatar' => 'https://placehold.co/100x100/EFEFEF/333?text=' . substr($user->name, 0, 1),
                'name' => $user->name, // Mengambil nama asli dari database
                'role' => $roles[array_rand($roles)],
                'projects' => rand(5, 15),
                'tasks_done' => rand(100, 300),
                'leave_entitlement' => rand(0, 5),
                'work_hours_percentage' => $workHoursPercentage,
            ];
        });

        // Mengirim data ke view
        return view('activity.index', ['employees' => $employeesData]);
    }
}