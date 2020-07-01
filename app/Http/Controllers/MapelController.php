<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;
use App\Guru;

class MapelController extends Controller
{
    public function index()
    {
    	$data_mapel = \App\Mapel::all();
    	$nama_guru = \App\Guru::all();
		return view('mapel.index', ['data_mapel' => $data_mapel, 'nama_guru' => $nama_guru]);
    }

    public function tambah(Request $request)
    {
    	// dd($request->all());
        $mapel = \App\Mapel::create($request->all());
        return redirect('/mapel')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mapel = \App\Mapel::find($id);
        $nama_guru = \App\Guru::all();
        return view('mapel.edit', ['mapel' => $mapel, 'nama_guru' => $nama_guru]);
    }

    public function proses_edit(Request $request, $id)
    {
        $mapel = \App\Mapel::find($id);
        $mapel->update($request->all());
        return redirect('/mapel')->with('sukses', 'Data berhasil diedit');
    }

    public function hapus($id)
    {
        $mapel = \App\Mapel::find($id);
        $mapel->delete($mapel);
        return redirect('/mapel')->with('sukses', 'Data berhasil dihapus');
    }
}
