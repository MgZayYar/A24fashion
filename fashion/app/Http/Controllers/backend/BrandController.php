<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' =>'required|max:191',
        'logo' =>'required|mimes:png,jpg,webp,bmp,jpeg'
        ]);

        $imageName = time().'.'.$request->logo->extension();
        $request->logo->move(public_path('images'),$imageName);
        $filepath ='images/'.$imageName;

        $brand = new Brand;
        $brand->name = $request->name;
        $brand->logo =$filepath;
        $brand->save();

        return redirect()->route('brands.index');
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
        $brands = Brand::find($id);
        return view('backend.brands.edit',compact('brands'));
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
         $request->validate([
        'name' =>'required|max:191',
        'logo' =>'required|mimes:png,jpg,webp,bmp,jpeg'
        ]);
         if($request->hasFile('logo')){
        $imageName = time().'.'.$request->logo->extension();
        $request->logo->move(public_path('images'),$imageName);
        $filepath ='images/'.$imageName;
    }else{
        $filepath = $request->oldPhoto;
    }

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->logo =$filepath;
        $brand->save();

        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find(id);
        $brand->delete();
        return redirect()->route('brands.index');

    }
}
