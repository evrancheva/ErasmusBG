<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Purifier;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Category;
use Storage;
use App\PostImage;
use Illuminate\Support\Facades\Input;
use Redirect;
use Intervention\Image\Facades\Image;
use App\User;
class AdminController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');

    }

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function getWelcome()
    {
        /*$posts = Post::orderBy('id','desc')->paginate(10);*/
        return view("admin.dashboard");
    }

    public function getPosts(){
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view("admin.posts.index")->withPosts($posts);
    }
    public function getUsers(){
        $users = User::orderBy('id','desc')->paginate(10);
        return view("admin.users.index")->withUsers($users);
    }
    public function showPost($id){
         $post = Post::find($id);
         $images = PostImage::where('post_id','=', $id)->get();
         return view("admin.posts.show")->withPost($post)->withImages($images);
    }
    public function showEditFormPost($id){
        $post = Post::find($id);
         $images = PostImage::where('post_id','=', $id)->get();
         return view("admin.posts.edit")->withPost($post)->withImages($images);
    }
    public function updatePost(Request $request, $id)
    {
        $post = Post::find($id);
       
            $this->validate($request,array(
                'title' => 'required|max:255',
                'body' => 'required',
                'body' => 'required',
                'featured_image' => 'image'
            ));
        
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->location = $request->location;
        $post->start_date = $request->start_date;
        $post->end_date = $request->end_date;
        $post->organization_email = $request->organization_email;
        $post->additional_link = $request->additional_link;        $post->body = Purifier::clean($request->input('body'));

     if($request->hasFile('featured_images')){

            $files = Input::file('featured_images');  
            foreach($files as $file) {

                $destinationPath = public_path('images\\');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->crop(500,500)->save($destinationPath . $filename);
                $postImage = new PostImage;
                $idOfImage = Post::where('title', $request->title)->first();
                $postImage->post_id = $idOfImage->id;
                $postImage->image_small =  $filename;
                $postImage->image_big =  $filename;
                $postImage->save();
              
              }
            }
  if($request->hasFile('upload_file')){
            $file = $request->file('upload_file');
            $filename = time() . '.pdf';
            $location = public_path('pdf/');
            Input::file('upload_file')->move($location,$filename);
             $oldFileName = $post->pdf;
            Storage::delete($oldFileName);
            $post->pdf = $filename;
        }
 
        $post->save();
       
      
        Session::flash('success','The blog post was successfully edited!');
        return redirect()->route('admin.posts.show',$post->id);
    }
    public function deletePost($id)
    {
        $post = Post::find($id);
        
        Storage::delete($post->image);
        $post->delete();
        Session::flash('success','The blog post was successfully deleted!');
        return redirect()->route('admin.posts');
    }
    

    public function destroyPostImage($id){
         $id = $_POST['id'];
       $image = PostImage::find($id);
       $image->delete();
        Session::flash('success','The image was successfully deleted!');
       
    }
     public function destroyPostPdf($id){
         $id = $_POST['id'];
        $post = Post::find($id);
        $oldFileName = $post->pdf;
        Storage::delete($oldFileName);
        $post->pdf = '';
        $post->save();
             
        Session::flash('success','The pdf was successfully deleted!');
    }
    public function showUser($id){
         $user = User::find($id);

         return view("admin.users.show")->withUser($user);
    }
     public function showEditUserForm($id){
        $user = User::find($id);
        
         return view("admin.users.edit")->withUser($user);
    }
     public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->confirmed = $request->confirmed;
        $user->save();
         Session::flash('success','The user was successfully confirmed!');
          return view("admin.users.show")->withUser($user);
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        
        Storage::delete($user->logo);
        $user->delete();
        Session::flash('success','The use was successfully deleted!');
        return redirect()->route('admin.users');
    }
    

}
