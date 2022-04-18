<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catergories = Category::latest()->get();
        return view('admin.category.index', ['categories'=>  $catergories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
           $request->validate([
          'name'=>'required|unique:categories,name',
          'image'=>'mimes:jpg,jpeg,png,bmp,gif',
           ]);

      //get form image
      $image= $request->file('image');
      $slug= Str::slug($request->name);

      if($image){

          //make image unique name
          $currentDate= Carbon::now()->toDateString();
          $imageName= $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        

          //check category directory if exists
          if(!Storage::disk('public')->exists('category')){
             Storage::disk('public')->makeDirectory('category');
          }
         
          //resize image for category banner  by (INTERVENTION IMAGE) laravel package
          //$resizedImage= Image::make($image)->resize(1600,479)->save($imageName,90);      AnotherWay
          $bannerImage= Image::make($image)->resize(1600,479)->stream();

          //upload it in the category folder
          Storage::disk('public')->put('category/'.$imageName,$bannerImage);


          //for category slider image copy all the above process
          if(!Storage::disk('public')->exists('category/slider')){
             Storage::disk('public')->makeDirectory('category/slider');
          }
           $sliderImage= Image::make($image)->resize(500,333)->stream();
           Storage::disk('public')->put('category/slider/'.$imageName,$sliderImage);
      }
      else{
          $imageName= 'default.png';
      }

      $category=new Category;
      $category->name=$request->name;
      $category->slug=$slug;
      $category->image=$imageName;
      $category->save();

      return redirect()->back()->with('success','Category name successfully added.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $category=Category::find($id);
        return view('admin.category.edit',['category'=>$category]);
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
       //validation
           $request->validate([
          'name'=>'required|unique:categories,name,'.$id,
          'image'=>'mimes:jpg,jpeg,png,bmp,gif',
           ]);

      

      //get form image
      $image= $request->file('image');
      $slug= Str::slug($request->name);
      $category=Category::find($id);


      if($image){

          //make image unique name
          $currentDate= Carbon::now()->toDateString();
          $imageName= $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        

          //check category directory if not exists
          if(!Storage::disk('public')->exists('category')){
             Storage::disk('public')->makeDirectory('category');
          }

          //delete old banner image
          if(Storage::disk('public')->exists('category/'.$category->image)){
              Storage::disk('public')->delete('category/'.$category->image);
          }
         
          //resize image for category banner  by (INTERVENTION IMAGE) laravel package

          $bannerImage= Image::make($image)->resize(1600,479)->stream();

          //upload it in the category folder
          Storage::disk('public')->put('category/'.$imageName,$bannerImage);


          //for category slider image copy all the above process
          if(!Storage::disk('public')->exists('category/slider')){
             Storage::disk('public')->makeDirectory('category/slider');
          }
           //delete old slider image
          if(Storage::disk('public')->exists('category/slider/'.$category->image)){
              Storage::disk('public')->delete('category/slider/'.$category->image);
          }

           $sliderImage= Image::make($image)->resize(500,333)->stream();
           Storage::disk('public')->put('category/slider/'.$imageName,$sliderImage);
      }
      else{
          $imageName= $category->image;
      }

      //updating details
      $category->name=$request->name;
      $category->slug=$slug;
      $category->image=$imageName;
      $category->save();

      return redirect()->route('admin.category.index')->with('success','Category name successfully updated.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);

          if(Storage::disk('public')->exists('category/'.$category->image)){
              Storage::disk('public')->delete('category/'.$category->image);
          }
          if(Storage::disk('public')->exists('category/slider/'.$category->image)){
              Storage::disk('public')->delete('category/slider/'.$category->image);
          }

        $category->delete();

        return redirect()->back()->with('success','Category successfully deleted.');
    
    }
}
