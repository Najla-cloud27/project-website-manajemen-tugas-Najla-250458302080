<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isAdmin;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = array(
            'title'                  => 'Dashboard',
            'menuDashboard'          => 'active',
            'jumlahUser'             => User::count(),
            'jumlahAdmin'            => User::where('jabatan', 'Admin')->count(),
            'jumlahKaryawan'         => User::where('jabatan', 'karyawan')->count(),
            'jumlahDitugaskan'       => User::where('jabatan', 'Karyawan')->where('is_tugas', true)->count(),
            'jumlahBelumDitugaskan'  => User::where('jabatan', 'Karyawan')->where('is_tugas', false)->count(),
        );
        return view('dashboard', $data);
    }
}