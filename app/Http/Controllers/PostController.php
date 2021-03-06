<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        if(!empty($request->image)) {
            $image_name = str_replace('public/', '', $request->image->store('public/images'));
            $request['image_url'] = 'https://dev.hermilanastacio.info/storage/'.$image_name.'';
        } else {
            $request['image_url'] = '';
        }

        return Post::create($request->all());
    }

    public function show($id)
    {
        return Post::find($id);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->update($request->all());

        return $post;
    }

    public function destroy($id)
    {
        Post::destroy($id);
    }
}
