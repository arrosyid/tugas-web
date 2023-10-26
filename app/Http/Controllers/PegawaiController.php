<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    //
    public function index(Request $request) {
        return $request->segment(2);
    }

    public function formulir() {
        return view('formulir');
    }

    public function proses(Request $request) {
        $message = [
            'required' => 'Input :attribute wajib diisi!',
            'min' => 'Input :attribute harus diisi minimal :min karakter!',
            'max' => 'Input :attribute harus diisi Maksimal :max karakter!',
        ];

        $this->validate($request,[
            'nama' => 'required|min:5|max:20',
            'alamat' => 'required|alpha'
        ], $message);

        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        return "Nama : ".$nama.", Alamat : ".$alamat;
    }

    public function eror500() {
        abort(500);
    }
    public function eror403() {
        abort(403);
    }
}

