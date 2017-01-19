<?php

namespace App\Http\Controllers;
use App\Post;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\PostImage;
use App\User;

class PagesController extends Controller{
    
    public function getIndex(){
        $users = User::all();
        $posts = Post::orderBy('created_at','desc')->limit(4)->get();
        
        return view('pages.welcome')->withPosts($posts)->withUsers($users);
    }
    public function getAbout(){
        return view('pages.about');
    }
    public function getContact(){
        return view('pages.contact');
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
            $message->to('elitsa.vr@gmail.com');
            $message->subject($data['subject']);
        });
        Session::flash('success','Your email was sent!');
        return redirect()->url('/');
    }
}