<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Banner;
use App\Rating;

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
    public function rate($id){

        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = $_POST['user_id'];
        $vote = $_POST['vote'];
        $ratingCollection = Rating::where('ip',$ip)->where('user_id',$user_id)->get();

        if($ratingCollection->count()){
            $changeRating = Rating::find($ratingCollection[0]['id']);

            $changeRating->vote = $vote;
            $changeRating->save();
              return "changedRating";
            
        }else{
             $rating = new Rating;
            $rating->user_id = $user_id;
            $rating->vote = $vote;
            $rating->ip =$ip;
            $rating->save();
            return "success";
        }

         
        
        
    }
}
