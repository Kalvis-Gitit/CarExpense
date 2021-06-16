<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Costs;
use App\Models\User;
use App\Models\Car;
use App\Models\Category;

class CostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $costs=Costs::where('cat_id','=',$id)->get();
        return view('costs',['cat_id'=>$id,'costs'=>$costs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $category = Category::findOrFail($id);
        return view('costs_new',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $costs = new Costs();
        $costs->cat_id=$request->cat_id;
        $costs->car_id=$request->car_id;
        $costs->description=$request->description;
        $costs->s_amount=$request->s_amount;
        $costs->date=$request->date;
        $costs->save();
        return redirect('costs/category/'.$costs->cat_id);
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
        //
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
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat_id = Costs::findOrFail($id)->cat_id;
        Costs::findOrFail($id)->delete();
        return redirect('costs/category/'.$cat_id);
    }
}
