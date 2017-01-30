<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Banner;

class BlogController extends Controller
{
    public function getSingle($slug){
        $post = Post::where('slug' ,'=', $slug)->first();
        return view('blog.single')->withPost($post);
    }


    public function getIndex()
    {
    	  $banner = Banner::where('id','=','3')->where('active','=','on')->get();
       
        $banner2 = Banner::where('id','=','4')->where('active','=','on')->get();
        $posts = Post::orderBy('id','desc')->paginate(6);
        return view('blog.index')->withPosts($posts)->withBanner($banner)->with('banner2',$banner2);;

    }
}
