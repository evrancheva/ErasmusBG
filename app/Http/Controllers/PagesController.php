<?php

namespace App\Http\Controllers;
use App\Post;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\PostImage;
use App\User;
use App\Banner;
use App\Rating;

class PagesController extends Controller{
    
    public function getIndex(){
        $users = User::where('confirmed','=','1')->get();
        $posts = Post::orderBy('created_at','desc')->limit(4)->get();
        $banner = Banner::where('id','=','1')->where('active','=','on')->get();
       
        $wideBanner = Banner::where('id','=','2')->where('active','=','on')->get();
        return view('pages.welcome')->withPosts($posts)->withUsers($users)->withBanner($banner)->with('wideBanner',$wideBanner);
    }
    public function getAbout(){
        $posts = Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.about')->withPosts($posts);
    }
    public function getOrganizations(){

        $organizations = User::where('confirmed','=','1')->orderBy('created_at','desc')->get();
       
               return view('pages.organizations')->withOrganizations($organizations);
    }
    public function getContact(){
        return view('pages.contact');
    }
     public function getTerms(){
        return view('pages.terms');
    }
    public function postContact(Request $request){
        $this->validate($request, array(
            'email'=>'required|email',
            'subject' => 'min:3',
            'message' =>'min:10'));
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' =>$request->message
            );

        Mail::send('emails.contact',$data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('erasmusbulgariainfo@gmail.com');
            $message->subject($data['subject']);
        });
        Session::flash('success','Your email was sent!');
        return redirect()->url('/');
    }
}