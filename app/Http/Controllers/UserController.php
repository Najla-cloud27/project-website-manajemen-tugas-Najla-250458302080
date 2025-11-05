<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Data User',
            'menuAdminUser' => 'active',
            'user'          => User::orderBy('jabatan', 'asc')->get(),
        ];
        return view('admin/user/index', $data);
    }

    public function create()
    {
        $data = [
            'title'         => 'Tambah Data User',
            'menuAdminUser' => 'active',
        ];
        return view('admin/user/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'email'     => 'required|unique:users,email',
            'jabatan'   => 'required',
            'password'  => 'required|confirmed|min:8',
        ], [
            'nama.required'         => 'Nama Tidak Boleh Kosong',
            'email.required'        => 'Email Tidak Boleh Kosong',
            'email.unique'          => 'Email sudah ada',
            'jabatan.required'      => 'Jabatan Harus Dipilih',
            'password.required'     => 'Password Tidak Boleh Kosong',
            'password.confirmed'    => 'Password Konfirmasi Tidak Sama',
            'password.min'          => 'Password Minimal 8 karakter',
        ]);

        $user = new User;
        $user->nama     = $request->nama;
        $user->email    = $request->email;
        $user->jabatan  = $request->jabatan;
        $user->password = bcrypt($request->password);
        $user->is_tugas = false;
        $user->save();

        return redirect()->route('user')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title'         => 'Edit Data User',
            'menuAdminUser' => 'active',
            'user'          => User::findOrFail($id),
        ];
        return view('admin/user/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required',
            'email'     => 'required|unique:users,email,' . $id,
            'jabatan'   => 'required',
            'password'  => 'nullable|confirmed|min:8',
        ], [
            'nama.required'         => 'Nama Tidak Boleh Kosong',
            'email.required'        => 'Email Tidak Boleh Kosong',
            'email.unique'          => 'Email sudah ada',
            'jabatan.required'      => 'Jabatan Harus Dipilih',
            'password.confirmed'    => 'Password Konfirmasi Tidak Sama',
            'password.min'          => 'Password Minimal 8 karakter',
        ]);

        $user = User::with('tugas')->findOrFail($id);
        $user->nama     = $request->nama;
        $user->email    = $request->email;
        $user->jabatan  = $request->jabatan;
        if ($request->jabatan=='Admin'){
            $user->is_tugas = false;
            $user->tugas()->delete();
        }
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('user')->with('success', 'Data Berhasil Di Edit');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('success', 'Data Berhasil Di Hapus');
    }

    public function excel()
    {
        $filename = now()->format('d-m-Y_H.i.s');
        return Excel::download(new UserExport, 'DataUser_'.$filename.'.xlsx');
    }

    public function pdf(){
        $filename = now()->format('d-m-Y_H.i.s');
        $data = array(
            'user'        => User::get(),
            'tanggal'     =>now()->format('d-m-Y'),
            'jam'         =>now()->format('H.i.s'),
        );

    $pdf = Pdf::loadView('admin/user/pdf', $data);
    return $pdf->setPaper('a4', 'landscape')->stream
    ('DataUser_'.$filename.'.pdf');
    
    }
}