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
use App\Country;
use App\Role;
use DB;
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

        $images = PostImage::where('post_id','=', $id)->get();
        

        $countries = Country::all();

        $countriess = array();
        foreach($countries as $country){
            $countriess[$country->id]=$country->name;
        }

        $post = Post::where('id','=',$id)->get()->first();
      
         return view('admin.posts.edit')->withPost($post)->withImages($images)->withCountries($countriess);
    }
    public function updatePost(Request $request, $id)
    {
        $post = Post::find($id);
       
            $this->validate($request,array(
                'title' => 'required|max:255',
                'country_id' => 'required',
                'body' => 'required',
                'featured_image' => 'image',
                'start_date' => 'required',
                'end_date' => 'required',
                'criteria' => 'required', 
                
                'fees'=>'required',
                'way_of_applying'=>'required',
                'location' => 'required',
               
            ));
        
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->location = $request->location;
        $post->start_date = $request->start_date;
        $post->slug =  cyr2url($post->title);
        $post->end_date = $request->end_date;
        $post->theme = $request->theme;
        $post->criteria = Purifier::clean($request->criteria);
        $post->fees = Purifier::clean($request->fees);
        $post->body = Purifier::clean($request->body);
        $post->way_of_applying = Purifier::clean($request->way_of_applying);    
        $post->country_id = $request->country_id;
         if($request->hasFile('main_image')){
                $file = $request->file('main_image');
                $destinationPath = public_path('images/');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->crop(400,400)->save($destinationPath . $filename);
                Storage::delete($post->image); 
                $post->image = $filename;              
         }
     if($request->hasFile('featured_images')){

            $files = Input::file('featured_images');  
            foreach($files as $file) {

                $destinationPath = public_path('images\\');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->crop(400,400)->save($destinationPath . $filename);
                $postImage = new PostImage;
                $idOfImage = Post::where('title', $request->title)->first();
                $postImage->post_id = $idOfImage->id;
                $postImage->image_small =  $filename;
                $postImage->image_big =  $filename;
                $postImage->save();
              
              }
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

    // TO DO update user ;)
    public function deleteUser($id)
    {
        $user = User::find($id);
        
        Storage::delete($user->logo);
        $user->delete();
        Session::flash('success','The use was successfully deleted!');
        return redirect()->route('admin.users');
    }
    public function updateInfoUser(Request $request, $id){
  
        $user = User::find($id);
         if($request->hasFile('logo')){
          $image = $request->file('logo');
               $filename = time() . '.' . $image->getClientOriginalExtension();
               $location = public_path('images/' . $filename);
              Image::make($image)->resize(150, 150)->save($location);
        $user->logo = $filename;
    }
        $site = $request->site;         
        if (strpos($site, 'http://') === false) {
            $siteAfterCheck = "http://" . $site;
        }
        else{
             $siteAfterCheck =$site;
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->site = $siteAfterCheck;
          $user->president = $request->president;
        $user->description = $request->description;
        $user->additional_information = $request->additional_information;

        $user->save();
          Session::flash('success','The user was successfully edited!');
          return redirect()->route("admin.users");
    }
    public function showRoles($id){
       
        $user = User::find($id);

        $findRoles = DB::table('user_role')->where('user_id', $user->id)->get();
      
        $roles = array();
        foreach($findRoles as $role){
            $findNameOfRole = Role::where('id','=',$role->role_id)->get()->first();
         
            array_push($roles,$findNameOfRole->name);
           
        }
      
        return view('admin.users.roles')->withRoles($roles)->withUser($user);
    }
     public function makeAdmin($id){
             $user = User::find($id);
             $user->roles()->attach(Role::where('name','Admin')->first());
          Session::flash('success','The user was successfully made admin!');
          return redirect()->route("admin.users");
    }
  public function removeAdmin($id){
             $user = User::find($id);
             $user->roles()->detach(Role::where('name','Admin')->first());
             Session::flash('success','The user was successfully removed from admins!');
             return redirect()->route("admin.users");
    }
    public function searchUser(Request $request){
    echo 123;
       die();
    }
    public function searchPosts(Request $request){
          $posts = Post::where('title', 'LIKE', '%'.$request->search.'%')->orWhere('location','LIKE','%'.$request->search.'%')->get();

       return view("admin.posts.results")->withPosts($posts);
    }
    

}
