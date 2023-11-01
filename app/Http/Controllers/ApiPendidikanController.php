<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class ApiPendidikanController extends Controller
{
    //
    public function getAll() {
        $pendidikan = Pendidikan::all();
        return response()->json($pendidikan, 201);
    }

    public function getPen($id) {
        $pendidikan = Pendidikan::find($id);
        return response()->json($pendidikan, 200);
    }

    public function createPen(Request $request) {
        Pendidikan::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Pendidikan Berhasil Ditambahkan!'
        ], 201);
    }

    public function updatePen($id, Request $request) {
        Pendidikan::find($id)->update($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Pendidikan Berhasil Dirubah!'
        ], 201);
    }

    public function deletePen($id) {
        Pendidikan::destroy($id);

        return response()->json([
            'status' => 'ok',
            'message' => 'Pendidikan Berhasil Dihapus!'
        ], 201);
    }
}
