<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\DataWarung;
use App\Models\DataPenerima;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahWarung = DataWarung::count();
        // $jumlahPenerima = DataPenerima::count();
        $jumlahDonatur = User::where('role', 'donatur')->count();

        return view('admin.dashboard', compact('jumlahWarung', 'jumlahDonatur'));
    }
}
