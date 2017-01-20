<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;


class BlogController extends Controller
{
    public function getSingle($slug){
        $post = Post::where('slug' ,'=', $slug)->first();
        return view('blog.single')->withPost($post);
    }


    public function getIndex()
    {
        $posts = Post::orderBy('id','desc')->paginate(6);
        return view('blog.index')->withPosts($posts);

    }
}
