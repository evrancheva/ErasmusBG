<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;


class AccountController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
  


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);

        return view('account.index')->withUser($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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


        $this->validate($request,array(
            'name' => 'required|max:255',
            'email' => 'required',
            'site' => 'required',
            'description' => 'required'
        ));

        $user = User::find(Auth::user()->id);;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->site = $request->site;
        $user->description = $request->description;



        $user->save();
        /* if(isset($request->tags)){
              $post->tags()->sync($request->tags);
         }
         else{
              $post->tags()->sync(array());
         }*/

        Session::flash('success','The profile was successfully edited!');
        return redirect()->route('account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    public function changePassword(Request $request)
    {
        $this->validate($request,array(
            'current_password' => 'required|max:255',
            'new_password' => 'required',
            'retype_password' => 'required|same:new_password',

        ));
        $user = User::find(Auth::user()->id);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->current_password,$hashedPassword)){

            $user->password = bcrypt($request->new_password);
            $user->save();
            Session::flash('success','The password was successfully edited!');
        }
        else{
            Session::flash('error','The passwords current password is other');
        }

        return redirect()->route('account.index');

    }
    public function addLogo(Request $request){
        $user = User::find(Auth::user()->id);

        if($request->featured_image){
          
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' .$filename);
            Image::make($image)->crop(400,400)->save($location);

            $user->logo = $filename;
            $user->save();
            Session::flash('success','The image was successfully uploaded!');

        }
        return redirect()->route('account.index');
    }
}
