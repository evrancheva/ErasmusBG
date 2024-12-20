<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
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
use App\Country;
class PostController extends Controller
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
    public function index()
    {
       $posts = Post::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        return view("posts.index")->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
         $countries = Country::all();
        return view("posts.create")->withCategories($categories)->withTags($tags)->withCountries($countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

        $this->validate($request,array(
            'title' => 'required|max:255|unique:posts',
            'body' => 'required',  
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'criteria' => 'required', 
            'main_image'=>'required',
            'fees'=>'required',
            'way_of_applying'=>'required',
            'country_id'=>'required'         
        ));

    
        $post = new Post;
        $post->title = $request->title;
        $post->slug =  cyr2url($post->title);
        $post->location = $request->location;
        $post->start_date = $request->start_date;
        $post->end_date = $request->end_date;
        $post->theme = $request->theme;
        $post->criteria = Purifier::clean($request->criteria);
        $post->fees = Purifier::clean($request->fees);
        $post->body = Purifier::clean($request->body);
        $post->way_of_applying = Purifier::clean($request->way_of_applying);
          $post->country_id = $request->country_id;
          /*   $post->category_id = $request->category_id;*/
        $post->user_id = Auth::user()->id;
        if($request->hasFile('main_image')){
              $image = $request->file('main_image');
               $filename = time() . '.' . $image->getClientOriginalExtension();
               $location = public_path('images/' . $filename);
              Image::make($image)->crop(400, 400)->save($location);
     
              $post->image = $filename;
               
           
        }

    
        $post->save();
        if($request->hasFile('featured_images')){

            $files = Input::file('featured_images');  
            foreach($files as $file) {
             
                $destinationPath = public_path('images/');
                $filename =uniqid() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->crop(400,400)->save($destinationPath . $filename);
              
                $postImage = new PostImage;
                $idOfImage = Post::where('title', $request->title)->first();
                $postImage->post_id = $idOfImage->id;
                $postImage->image_small =  $filename;
                $postImage->image_big =  $filename;
                $postImage->save();
              
              }
            }

            
        /*$post->tags()->sync($request->tags,false);*/
        Session::flash('success','The blog post was successfully saved!');
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::where('id','=',$id)->where('user_id','=',Auth::user()->id)->get();
        if(!$post->isEmpty()){
           $post = Post::find($id);
           $images = PostImage::where('post_id','=', $id)->get();
            return view('posts.show')->withPost($post)->withImages($images);  
        }
        else{

           return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $images = PostImage::where('post_id','=', $id)->get();
        $tags = Tag::all();
        $tagss = array();
         foreach($tags as $tag){
            $tagss[$tag->id]=$tag->name;
        }
        $categories = Category::all();

        $cats = array();
        foreach($categories as $category){
            $cats[$category->id]=$category->name;
        }

        $countries = Country::all();

        $countriess = array();
        foreach($countries as $country){
            $countriess[$country->id]=$country->name;
        }

        $post = Post::where('id','=',$id)->where('user_id','=',Auth::user()->id)->get();
        if(!$post->isEmpty()){
           $post = Post::find($id);
            return view('posts.edit')->withTags($tagss)->withPost($post)->withCategories($cats)->withImages($images)->withCountries($countriess);
        }
        else{

           return redirect()->back();
        }
      
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        Session::flash('success','The blog post was successfully deleted!');
        return redirect()->route('posts.index');
    }
    public function destroyImage($id){
        $id = $_POST['id'];
       $image = PostImage::find($id);
       
        Storage::delete($image->image_small);
         $image->delete();
       
        return response()->json(['return' => 'some hi']);
    }
     public function destroyPdf($id){
         $id = $_POST['id'];
        $post = Post::find($id);
        $oldFileName = $post->pdf;
        Storage::delete($oldFileName);
        $post->pdf = '';
        $post->save();
             
        Session::flash('success','The pdf was successfully deleted!');
       
    }
    public function searchPosts(Request $request){
        $country = Country::where('name','LIKE', '%'.$request->search.'%')->first();
        $user_id = Auth::user()->id;
        if(empty($country)){
             $posts = Post::where('title', 'LIKE', '%'.$request->search.'%')->where('user_id','=',$user_id)->orWhere('location','LIKE','%'.$request->search.'%')->get();
        }else{
               $posts = Post::where('title', 'LIKE', '%'.$request->search.'%')->where('user_id','=',$user_id)->orWhere('location','LIKE','%'.$request->search.'%')->orWhere('country_id','=',$country->id)->get(); 
        }
    

       return view("posts.results")->withPosts($posts);
    }

    

}
