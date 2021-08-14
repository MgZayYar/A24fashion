<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $subcategories = Subcategory::all(); //to show all data from Subategory.php
         $categories = Category::all();
         //$subcategories is variable name
       return view('backend.subcategories.index',compact('subcategories','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = Category::all(); //to show all data from Subategory.php
        //dd($categories); die();
         return view('backend.subcategories.create',compact('categories'));
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
            'name'=>'required|max:191',
            'category_id'=>'required'
            // 'logo'=>'required|mimes:jpeg,bmp,png,jpg'
        ]);

        //file upload
        // $imageName= time().'.'.$request->logo->extension();
        // $request->logo->move(public_path('images'),$imageName);
        //     $filepath ='images/'.$imageName;

            //data insert
            $subcategory = new Subcategory; //need model
            $subcategory->name = $request->name;
            $subcategory->category_id = $request->category_id;
            // $subcategory->logo = $filepath;
            $subcategory->save();

            //return
            return redirect()->route('subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return view('backend.subcategories.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = Subcategory::find($id);
        return view('backend.subcategories.edit',compact('subcategory','categories'));
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
            'name'=>'required|max:191',
            'category_id'=>'required'
            // 'logo'=>'required|mimes:jpeg,bmp,png,jpg'
        ]);

        //file upload
        // $imageName= time().'.'.$request->logo->extension();
        // $request->logo->move(public_path('images'),$imageName);
        //     $filepath ='images/'.$imageName;

            //data insert
            $subcategory =Subcategory::find($id); //need model
            $subcategory->name = $request->name;
            $subcategory->category_id = $request->category_id;
            // $subcategory->logo = $filepath;
            $subcategory->save();

            //return
            return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $subcategory = Subcategory::find($id);
        $subcategory -> delete();
        return redirect()->route('subcategories.index');
    }
}
