<?php

namespace App\Http\Controllers\Member;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data = Post::where("user_id", $user->id)->orderBy('id', 'desc')->paginate(3);
        return view('member.blogs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'thumbnail' => 'image|mimes:jpg,jpeg,png|max:10240',
        ], [
            'title.required' => 'Judul harus diisi !',
            'description.required' => 'Deskripsi harus diisi !',
            'content.required' => 'Content harus diisi !',
            'thumbnail.image' => 'Thumbnail harus diisi !',
            'thumbnail.mimes' => 'Ekstensi yang diperbolehkan hanya JPG, JPEG & PNG !',
            'thumbnail.max' => 'Ukuran gambar Max 10mb !',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $destination_path = public_path(getenv('CUSTOM_THUMBNAIL_LOCATION'));
            $image->move($destination_path, $image_name);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => isset($image_name) ? $image_name : null,
            'content' => $request->content,
            'status' => $request->status,
            'slug' => $this->generateSlug($request->title),
            'user_id' => Auth::user()->id,
        ];

        post::create($data);
        return redirect()->route('member.blogs.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource. 
     */
    public function edit(Post $post)
    {
        $data = $post;
        return view('member.blogs.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'thumbnail' => 'image|mimes:jpg,jpeg,png|max:10240',
        ], [
            'title.required' => 'Judul harus diisi !',
            'description.required' => 'Deskripsi harus diisi !',
            'content.required' => 'Content harus diisi !',
            'thumbnail.image' => 'Thumbnail harus diisi !',
            'thumbnail.mimes' => 'Ekstensi yang diperbolehkan hanya JPG, JPEG & PNG !',
            'thumbnail.max' => 'Ukuran gambar Max 10mb !',
        ]);

        if ($request->hasFile('thumbnail')) {
            if (isset($post->thumbnail) && file_exists(public_path(getenv('CUSTOM_THUMBNAIL_LOCATION')) . "/" . $post->thumbnail)) {
                unlink(public_path(getenv('CUSTOM_THUMBNAIL_LOCATION')) . "/" . $post->thumbnail);
            }
            $image = $request->file('thumbnail');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $destination_path = public_path(getenv('CUSTOM_THUMBNAIL_LOCATION'));
            $image->move($destination_path, $image_name);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => isset($image_name) ? $image_name : $post->thumbnail,
            'content' => $request->content,
            'status' => $request->status,
            'slug' => $this->generateSlug($request->title, $post->id),
        ];

        post::where('id', $post->id)->update($data);
        return redirect()->route('member.blogs.index')->with('success', 'Perubahan data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    private function generateSlug($title, $id = null)
    {
        $slug = Str::slug($title);
        $count = Post::where('slug', $slug)->when($id, function ($query, $id) {
            return $query->where('id', '!=', $id);
        })->count();

        if ($count > 0) {
            $slug = $slug . "-" . ($count + 1);
        }
        return $slug;
    }
}
