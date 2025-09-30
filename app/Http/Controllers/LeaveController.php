<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LeaveController extends Controller
{
    /**
     * Menampilkan form pengajuan cuti.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        // Data dummy untuk kategori cuti
        $leaveCategories = [
            'Annual Leave',
            'Sick Leave',
            'Maternity Leave',
            'Unpaid Leave',
        ];

        return view('absent.index', ['leaveCategories' => $leaveCategories]);
    }

    /**
     * Menyimpan data pengajuan cuti baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input dari form
        $validated = $request->validate([
            'leave_category' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required|string|max:1000',
            'bring_laptop' => 'required|in:yes,no',
            'can_be_contacted' => 'required|in:yes,no',
        ]);

        // Redirect kembali ke halaman form dengan pesan sukses
        return redirect()->route('absent.index')->with('success', 'Leave submission has been sent successfully!');
    }
}