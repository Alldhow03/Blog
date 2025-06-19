<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogDetailController extends Controller
{
    public function detail($slug)
    {
        $data = Post::where('status', 'publish')->where('slug', $slug)->firstOrFail();
        $pagination = $this->pagination($data->id);
        return view('components.front.blog-detail', compact('data', 'pagination'));
    }

    private function pagination($id)
    {
        $dataPrev = Post::where('status', 'publish')->where('id', '<', $id)->OrderBy('id', 'desc')->first();
        $dataNext = Post::where('status', 'publish')->where('id', '>', $id)->OrderBy('id', 'desc')->first();

        $data = [
            'prev' => $dataPrev,
            'next' => $dataNext
        ];
        return $data;
    }
}
