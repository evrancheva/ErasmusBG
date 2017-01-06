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
        return view("posts.create")->withCategories($categories)->withTags($tags);
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
            'organization_email' => 'required',           
        ));

    
        $post = new Post;
        $post->title = $request->title;
        $post->slug =  preg_replace('/[^A-Za-z0-9-]+/', '-', $post->title);
        $post->location = $request->location;
        $post->start_date = $request->end_date;
        $post->end_date = $request->end_date;
        $post->organization_email = $request->organization_email;
        $post->additional_link = $request->additional_link;
        $post->body = Purifier::clean($request->body);
          /*   $post->category_id = $request->category_id;*/
        $post->user_id = Auth::user()->id;
        if($request->hasFile('upload_file')){
            $file = $request->file('upload_file');
            $filename = time() . '.pdf';
            $location = public_path('pdf/');
            Input::file('upload_file')->move($location,$filename);
            $post->pdf = $filename;
        }
        $post->save();
        if($request->hasFile('featured_images')){

            $files = Input::file('featured_images');  
            foreach($files as $file) {

                $destinationPath = public_path('images/');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $upload_success = $file->move($destinationPath, $filename);
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

        $post = Post::find($id);
        $images = PostImage::where('post_id','=', $id)->get();
        return view('posts.show')->withPost($post)->withImages($images);
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
        $post = Post::find($id);
        return view('posts.edit')->withTags($tagss)->withPost($post)->withCategories($cats)->withImages($images);;
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

       /* if($request->featured_image){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' .$filename);
            Image::make($image)->resize(800,400)->save($location);
             $oldFileName = $post->image;
             $post->image = $filename;
             Storage::delete($oldFileName);

    }  */
     if($request->hasFile('featured_images')){

            $files = Input::file('featured_images');  
            foreach($files as $file) {

                $destinationPath = public_path('images/');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $upload_success = $file->move($destinationPath, $filename);
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
       /* if(isset($request->tags)){
             $post->tags()->sync($request->tags);
        }
        else{
             $post->tags()->sync(array());
        }*/
      
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
       $image->delete();
        Session::flash('success','The image was successfully deleted!');
       
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
}
