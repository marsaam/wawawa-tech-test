<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    // public function getDataPegawai()
    // {
    //     $pegawaiModel = PegawaiModel::all();
    //     return response()->json($pegawaiModel);
    // }

    public $pegawai = [
        'nama_lengkap' => 'nullable|string|max:255',
        'alamat' => 'nullable|string|max:255',
        'jk' => 'nullable|string|max:255',
        'nomor_hp' => 'nullable|string|max:255',
        'email' => 'required|string|max:255',
        'jabatan' => 'nullable|string|max:255',
        'password' => 'required|string|max:255',
        'status' => 'nullable|string|max:255',
    ];

    public function pegawai()
    {
        $pegawaiModel = PegawaiModel::all();

        return view('welcome', compact('pegawaiModel'));
    }

    public function login()
    {
        return view('login');
    }

    public function postLogin()
    {
        $email = request('email');
        $password = request('password');

        $pegawaiModel = PegawaiModel::where('email', $email)->first();

        if ($pegawaiModel) {
            if ($password == $pegawaiModel->password) {
                return redirect('/');
            } else {
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Redirect to the home page or login page
    }

    public function tambahPegawai(Request $request)
    {
        $validated_pegawai = $request->validate($this->pegawai);
        PegawaiModel::create($validated_pegawai);
        // PegawaiModel::create([
        //     'nama_lengkap' => $request->nama_lengkap,
        //     'alamat' => $request->alamat,
        //     'jk' => $request->jk,
        //     'nomor_hp' => $request->nomor_hp,
        //     'email' => $request->email,
        //     'jabatan' => $request->jabatan,
        //     'password' => $request->password,
        //     'status' => "Aktif",
        // ]);
        // $dataPegawai = [
        //     'nama_lengkap' => $request->nama_lengkap,
        //     'alamat' => $request->alamat,
        //     'jk' => $request->jk,
        //     'nomor_hp' => $request->nomor_hp,
        //     'email' => $request->email,
        //     'jabatan' => $request->jabatan,
        //     'password' => $request->password,
        //     'status' => "Aktif",
        // ];

        // PegawaiModel::create($dataPegawai);

        return redirect()->back();
    }
}
