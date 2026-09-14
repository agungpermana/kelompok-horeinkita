<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $jumlahWarung = User::where('role', 'warung')->count();
        $jumlahPenerima = User::where('role', 'penerima')->count();
        $jumlahDonatur = User::where('role', 'donatur')->count();

        return view('admin.dashboard', compact(
            'jumlahWarung',
            'jumlahPenerima',
            'jumlahDonatur'
        ));
    }
}