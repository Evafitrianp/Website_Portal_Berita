<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Berita berhasil diperbarui!');
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'required|string|max:255',
        ]);
        $post->update($request->all());
    Alert::success('Berhasil', 'Berita berhasil diperbarui!');
    return redirect()->route('posts.index');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Berita berhasil dihapus!');
    }

    public function data()
    {
        $posts = Post::select(['id', 'title', 'author', 'created_at', 'updated_at']);

        return DataTables::of($posts)
            ->addColumn('action', function($post) {
                return '<a href="'.route('posts.edit', $post->id).'" class="btn btn-warning">Edit</a>
                        <form action="'.route('posts.destroy', $post->id).'" method="POST" style="display:inline;">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit" class="btn btn-danger mt-3" onclick="return confirm(\'Anda yakin ingin menghapus berita ini?\')">Hapus</button>
                        </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}