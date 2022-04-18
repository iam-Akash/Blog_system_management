<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class profileSettingsController extends Controller
{
   public function index(){
       return view('admin.settings');
   }

   public function profileUpdate(Request $request){
       $this->validate($request,[
           'name'=>'required',
           'email'=>'required',
           'image'=>'image',
       ]);

       $image=$request->file('image');
       $slug=Str::slug($request->name);
       $user=User::findOrFail(Auth::id());

       if(isset($image)){
           $currentDate=Carbon::now()->toDateString();
           $imageName=$slug.'-'.$currentDate. '-'. uniqid().'.'.$image->getClientOriginalExtension();
          
           if(!Storage::disk('public')->exists('profile_picture')){
                Storage::disk('public')->makeDirectory('profile_picture');
           }

           if(Storage::disk('public')->exists('profile_picture/'.$user->image)){
               if($user->image != 'default.png'){
                   Storage::disk('public')->delete('profile_picture/'.$user->image);
               }  
           }

           $imageResize=Image::make($image)->resize(500,500)->stream();
           Storage::disk('public')->put('profile_picture/'.$imageName, $imageResize);
       }
       else{
           $imageName=$user->image;
       }

       $user->name=$request->name;
       $user->email=$request->email;
       $user->about=$request->about;
       $user->image=$imageName;
       $user->save();
       return redirect()->back()->with('success', 'Your profile successfully updated');
   }

   public function passwordUpdate(Request $request){
       $this->validate($request, [
         'old_password'=>'required',  
        'password'=> 'required|confirmed',
       ]);

       if(Hash::check($request->old_password, Auth::user()->password)){
           if(!Hash::check($request->password, Auth::user()->password)){
                $user= User::findOrFail(Auth::id());
                $user->password= Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->back()->with('success', 'Password Successfully Updated');
           }
           else{
               return redirect()->back()->with('error' , 'Cannot use old password');
           }
       }else{
           return redirect()->back()->with('error' , 'Old password not matched');
       }
   }
}
