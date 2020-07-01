<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
    	$data_post = Post::all();
    	return view('posts.index', compact('data_post'));
    }

    public function tambah()
    {
   	 	return view('posts.tambah');    
    }

    public function proses_tambah(Request $request)
    {
    	$post = Post::create([
    		'user_id' => auth()->user()->id,
    		'title' => $request->title,
    		'content' => $request->content,
    		'thumbnail' => $request->thumbnail
    	]);
    	if ($request->hasFile('thumbnail')) {
            $request->file('thumbnail')->move('images_thumbnail/', $request->file('thumbnail')->getClientOriginalName());
            $post->thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $post->save();
        }
    	return redirect()->route('post.index')->with('sukses', 'Post berhasil ditambahkan');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact(['post']));
    }

    public function proses_edit(Request $request, Post $post)
    {
        $post->update($request->all());
        if ($request->hasFile('thumbnail')) {
            $request->file('thumbnail')->move('images_thumbnail/', $request->file('thumbnail')->getClientOriginalName());
            $post->thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $post->save();
        }
        return redirect()->route('post.index')->with('sukses', 'Post berhasil diedit');
    }

    public function hapus(Post $post)
    {
        $post->delete($post);
        return redirect()->route('post.index')->with('sukses', 'Post berhasil dihapus');
    }
}
