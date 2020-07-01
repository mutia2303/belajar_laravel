<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
    	$data_forum = Forum::orderBy('created_at', 'desc')->paginate(10);
    	return view('forum.index', compact(['data_forum']));
    }

    public function tambah(Request $request)
    {
    	$request->request->add(['user_id' => auth()->user()->id]);
    	$forum = Forum::create($request->all());
    	return redirect()->back()->with('sukses', 'Forum berhasil ditambahkan');
    }

    public function detail(Forum $forum)
    {
    	return view('forum.detail', compact(['forum']));
    }
}
