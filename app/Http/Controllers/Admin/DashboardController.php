<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\DataWarung;
use App\Models\data_penerima;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahWarung = DataWarung::count();
        $jumlahPenerima = data_penerima::count();
        $jumlahDonatur = User::where('role', 'donatur')->count();

        return view('admin.dashboard', compact('jumlahWarung', 'jumlahPenerima', 'jumlahDonatur'));
    }
}
