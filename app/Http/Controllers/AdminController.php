<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User; 
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Menampilkan daftar sumber daya manusia (pengguna).
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $users = User::with('roles')->get();

        $sdmData = $users->map(function ($user) {
            $roleName = $user->roles->last()->name ?? 'Tidak ada Role';

            // Data dummy untuk divisi
            $divisions = ['Analis', 'Backend Developer', 'Front End Developer', 'UI/UX Designer', 'DevOps'];

            return (object) [
                'name' => $user->name,
                'role' => $roleName,
                'division' => $divisions[array_rand($divisions)],
                'email' => $user->email,
            ];
        });

        // Data dummy untuk filter divisi
        $divisionFilters = ['Analis', 'Backend Developer', 'Front End Developer', 'UI/UX Designer'];

        return view('admin.index', [
            'sdmList' => $sdmData,
            'divisionFilters' => $divisionFilters
        ]);
    }
}