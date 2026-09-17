<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use App\Models\katalog_paket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $paket = katalog_paket::with('warung')->get();

        return view('donatur.index', compact('paket'));
    }
}