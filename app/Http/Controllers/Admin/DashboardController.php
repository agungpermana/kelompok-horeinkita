<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahWarung = User::where('role', 'warung')->count();
        $jumlahPenerima = User::where('role', 'penerima')->count();
        $jumlahDonatur = User::where('role', 'donatur')->count();

        return view('admin.dashboard', compact('jumlahWarung', 'jumlahPenerima', 'jumlahDonatur'));
    }
}
