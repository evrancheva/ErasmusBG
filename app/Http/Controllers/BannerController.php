<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Image;
use Storage;
use Session;

class BannerController extends Controller
{
    public function getBanners(){
    	$banners = Banner::all();
        return view('admin.banners.index')->withBanners($banners);
    }
    public function showEditBanner($id){
			$banner = Banner::find($id);

         	$value = ($banner->active =='on') ? 1 : 0;
         return view("admin.banners.edit")->withBanner($banner)->withValue($value);
    }
     public function updateBanner(Request $request,$id){
			$banner = Banner::find($id);

			  if($request->hasFile('banner')){
                $file = $request->file('banner');
                $destinationPath = public_path('images/');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->save($destinationPath . $filename);
                Storage::delete($banner->image); 
                $banner->image = $filename;              
         }
         $banner->link = $request->link;
         $banner->active = $request->active;
         $banner->save();
         Session::flash('success','The banner was successfully edited!');
          return redirect()->route('admin.banners_management');
    }
}
