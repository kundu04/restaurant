<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['foods']=Food::simplePaginate(10);
        return view('food.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories']=Category::get();
        return view('food.create',$data);
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
        'name'=>'required',
        'description'=>'required',
        'category_id'=>'required',
        'price'=>'required',
        'image'=>'required|mimes:png,jpeg,jpg',

        ]);
        $image=$request->file('image');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$name);
        $food= new Food;
        $food->name=$request->name;
        $food->category_id=$request->category_id;
        $food->description=$request->description;
        $food->price=$request->price;
        $food->image=$name;
        $food->save();
        return redirect()->route('food.index')->with('message','Food added successfully');

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
        $data['categories']=Category::get();
        $data['food']=Food::findOrFail($id);
        return view("food.edit",$data);
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
            'name'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'image'=>'mimes:png,jpeg,jpg',
    
            ]);
            $food= Food::findORFail($id);
            $name=$food->image;

            if($request->hasFile('image')){
            $image=$request->file('image');
            $name=time().'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images');
            $image->move($destinationPath,$name);
            }
            
            $food->name=$request->name;
            $food->category_id=$request->category_id;
            $food->description=$request->description;
            $food->price=$request->price;
            $food->image=$name;
            $food->save();
            return redirect()->route('food.index')->with('message','Food updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food=Food::findOrFail($id);
        $food->delete();
        return redirect()->route('food.index')->with('message','Food Deleted successfully');

    }
    public function listFood()
    {
        $data['categories']=Category::with('relFood')->get();
        return view('food.list',$data);
    }
    public function view($id)
    {

        $data['food']=Food::findOrFail($id);
        return view('food.view',$data);
    }
}
