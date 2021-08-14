<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Brand;
use App\Subcategory;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view('backend.items.index',compact('items','brands','subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view('backend.items.create',compact('brands','subcategories'));
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
            'codeno' =>'required',
            'name' => 'required|max:191',
            'photo' =>'required|mimes:jpg,png,jpeg,webp,bmp',
            'price' =>'required|max:255',
            'brand_id' =>'required',
            'subcategory_id' =>'required'
        ]);

        $imageName =time().'.'.$request->photo->extension();
        $request->photo->move(public_path('images'),$imageName);
        $filepath = 'images/'.$imageName;

        $item = new Item;
        $item->codeno =$request->codeno;
        $item->name =$request->name;
        $item->photo =$filepath;
        $item->price =$request->price;
        $item->brand_id =$request->brand_id;
        $item->subcategory_id =$request->subcategory_id;
        $item->save();

        return redirect()->route('items.index');

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
        
        $item = Item::find($id);
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view('backend.items.edit',compact('item','brands','subcategories'));
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
            'codeno'=>'required',
            'price'=>'required',
            'subcategory_id'=>'required',
            'brand_id'=>'required',
            'photo'=>'required|mimes:jpeg,bmp,png,jpg'
        ]);

        if ($request->hasFile('photo')) {
            
        $imageName= time().'.'.$request->photo->extension();
        $request->photo->move(public_path('images'),$imageName);
            $filepath ='images/'.$imageName;   
            unlink($request->oldphoto);
        }else{
            $filepath = $request->oldphoto;
        }

            //data insert
            $item = Item::find($id); //need model
            $item->name = $request->name;
            $item->codeno = $request->codeno;
            $item->price = $request->price;
            $item->photo = $filepath;
            $item->subcategory_id = $request->subcategory_id;
            $item->brand_id = $request->brand_id;
            // $item->photo = $filepath;
            $item->save();

            //return
            return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect()->route('items.index');
    }
}
