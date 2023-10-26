<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendidikanController extends Controller
{
    //
    public function index() {
        $pendidikan = Pendidikan::get();
        return view('backend.pendidikan.index',compact('pendidikan'));
    }

    public function create() {
        $pendidikan = null;
        return view('backend.pendidikan.create', compact('pendidikan'));
    }

    public function store(Request $request) {

        Pendidikan::create($request->all());

        return redirect()->route('pendidikan.index')->with('success', 'Data pendidikan baru telah berhasil disimpan.');
    }

    public function edit($id) {
        $pendidikan = Pendidikan::where('id', $id)->get()->first();
        return view('backend.pendidikan.create', compact('pendidikan'));
    }

    public function update(Request $request, Pendidikan $pendidikan) {

        $pendidikan->update($request->all());
        return redirect()->route('pendidikan.index')
        ->with('success', 'Data pendidikan baru telah berhasil disimpan.');
    }

    public function destroy($id) {
        $pendidikan = Pendidikan::find($id);
        $pendidikan->delete();
        return redirect()->route('pendidikan.index')
        ->with('success', 'Data Pendidikan Berhasil Dihapus');
    }
}
