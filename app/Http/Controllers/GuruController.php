<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use Illuminate\Support\Str;

class GuruController extends Controller
{
	public function index()
	{
		$data_guru = \App\Guru::all();
		return view('guru.index', ['data_guru' => $data_guru]);
	}

	public function tambah(Request $request)
	{
		$this->validate($request, [
            'email' => 'unique:users',
            'avatar' => 'mimes:jpg,jpeg,png'
        ]);
		//Insert ke tabel users
        $user = new \App\User;
        $user->role = 'guru';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('12345678');
        $user->remember_token = Str::random(60);
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images_guru/', $request->file('avatar')->getClientOriginalName());
            $user->avatar = $request->file('avatar')->getClientOriginalName();
            $user->save();
        }
        $user->save();
        //Insert ke tabel guru
        $request->request->add(['user_id' => $user->id]);
		$guru = \App\Guru::create($request->all());
		if ($request->hasFile('avatar')) {
            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->save();
        }
        return redirect('/guru')->with('sukses', 'Data berhasil ditambahkan');
	}

	public function edit($id)
	{
		$guru = \App\Guru::find($id);
		return view('guru.edit', ['guru' => $guru]);
	}

	public function proses_edit(Request $request, $id)
	{
		$guru = \App\Guru::find($id);
		$guru->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images_guru/', $request->file('avatar')->getClientOriginalName());
            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->save();
        }
    	return redirect('/guru')->with('sukses', 'Data berhasil diedit');
	}

	public function hapus($id)
	{
		$guru = \App\Guru::find($id);
		$guru->delete($guru);
		return redirect('/guru')->with('sukses', 'Data berhasil dihapus');
	}

    public function profil($id)
    {
    	$guru = Guru::find($id);
    	return view('guru.profil', ['guru' => $guru]);
    }
}
