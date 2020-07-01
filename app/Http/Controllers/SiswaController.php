<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Siswa;
use App\User;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
    	if($request->has('cari')) {
    		// $data_siswa = \App\Siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->paginate(20);
            // {{ $data_siswa->links() }} --> index.blade
            $data_siswa = \App\Siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->get();
    	} 
    	else {
    	    // $data_siswa = \App\Siswa::paginate(20);
            $data_siswa = \App\Siswa::all();
    	}
    	return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function tambah(Request $request)
    {
        $this->validate($request, [
            'nama_depan' => 'min:3',
            'nama_belakang' => 'min:1',
            'email' => 'unique:users',
            'avatar' => 'mimes:jpg,jpeg,png'
        ]);
        //Insert ke tabel users
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images_siswa/', $request->file('avatar')->getClientOriginalName());
            $user->avatar = $request->file('avatar')->getClientOriginalName();
            $user->save();
        }
        $user->save();
        //Insert ke tabel siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Siswa::create($request->all());
        if ($request->hasFile('avatar')) {
            // $request->file('avatar')->move('images_siswa/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
    	return redirect('/siswa')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function edit(Siswa $siswa)
    {
    	// $siswa = \App\Siswa::find($id);
    	return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function proses_edit(Request $request, Siswa $siswa)
    {
    	// $siswa = \App\Siswa::find($id);
    	$siswa->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images_siswa/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
    	return redirect('/siswa')->with('sukses', 'Data berhasil diedit');
    }

    public function hapus(Siswa $siswa)
    {
    	// $siswa = \App\Siswa::find($id);
    	$siswa->delete($siswa);
    	return redirect('/siswa')->with('sukses', 'Data berhasil dihapus');
    }

    public function profil(Siswa $siswa)
    {
        // $siswa = \App\Siswa::find($id);
        //Data untuk tabel
        $mata_pelajaran = \App\Mapel::all();
        //Data untuk chart
        $categories = [];
        $data = [];
        foreach ($mata_pelajaran as $mp) {
            if ($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
            
        }
        return view('siswa.profil', ['siswa' => $siswa, 'mata_pelajaran' => $mata_pelajaran, 'categories' => $categories, 'data' => $data]);
    }

    public function tambah_nilai(Request $request, $id_siswa)
    {
        // dd($request->all());
        $siswa = \App\Siswa::find($id_siswa);
        if ($siswa->mapel()->where('mapel_id', $request->mapel)->exists()) {
            return redirect('/siswa/'.$id_siswa.'/profil')->with('error', 'Data mata pelajaran sudah ada');
        }
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);
        return redirect('/siswa/'.$id_siswa.'/profil')->with('sukses', 'Data nilai berhasil ditambahkan');
    }

    public function hapus_nilai($id_siswa, $id_mapel)
    {
        $siswa = \App\Siswa::find($id_siswa);
        $siswa->mapel()->detach($id_mapel);
        return redirect()->back()->with('sukses', 'Data nilai berhasil dihapus');
    }

     public function export_excel()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function export_pdf()
    {
        $siswa = \App\Siswa::all();
        $pdf = PDF::loadView('siswa.export_pdf', ['siswa' => $siswa])->setPaper('a4', 'portrait');
        return $pdf->download('siswa.pdf');
    }

    public function nilai()
    {
        $data_siswa = \App\Siswa::paginate(20);
        return view('nilai.index', ['data_siswa' => $data_siswa]);
    }

    public function getdatasiswa()
    {
        $siswa = Siswa::select('siswa.*');
        return \DataTables::eloquent($siswa)
        ->addColumn('nama_lengkap', function($s) {
            return $s->nama_lengkap();
        })
        ->addColumn('jumlah_nilai', function($s) {
            return $s->total();
        })
        ->addColumn('aksi', function($s) {
            return '<a href="/siswa/'.$s->id.'/profil" class="btn btn-info btn-sm">Profil</a> <a href="/siswa/'.$s->id.'/edit" class="btn btn-warning btn-sm">Edit</a> <a href="#" class="btn btn-danger btn-sm hapus" siswa-id="'.$s->id.'">Hapus</a>';
        })
        ->rawColumns(['nama_lengkap', 'jumlah_nilai', 'aksi'])
        ->toJson();
    }

    public function profil_saya()
    {
        $siswa = auth()->user()->siswa;
        return view('siswa.profil_saya', compact(['siswa']));
    }

    public function importexcel(Request $request)
    {
        // $this->validate($request, [
        //     'import' => 'mimes:xls,xlsx'
        // ]);
        Excel::import(new \App\Imports\SiswaImport, $request->file('data_siswa'));
        // dd($request->all());
        return redirect('/siswa')->with('sukses', 'Import excel berhasil ditambahkan');
    }
}
