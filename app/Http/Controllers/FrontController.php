<?php

namespace App\Http\Controllers;

use App\Mail\NotifPendaftaranSiswa;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function home()
    {
        $data_post = Post::all();
    	return view('front.home', compact(['data_post']));
    }

    public function register()
    {
    	return view('front.register');
    }

    public function proses_register(Request $request)
    {
    	//Insert ke tabel users
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();
        //Insert ke tabel siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Siswa::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images_siswa/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        // \Mail::raw('Selamat Datang '.$user->name, function ($message) use($user) {
        //     $message->to($user->email, $user->name);
        //     $message->subject('Selamat Anda Sudah Terdaftar di Sekolah Kami');
        // });

        \Mail::to($user->email)->send(new NotifPendaftaranSiswa);

    	return redirect('/')->with('sukses', 'Data berhasil ditambahkan');
    }

     public function single_post($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        return view('front.singlepost', compact(['post']));
    }
}
