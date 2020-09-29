<?php

namespace App\Http\Controllers;
use App\category;
use Illuminate\Http\Request;

class ExCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::all();

        return view('expensesCategory.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expensesCategory.create');
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
            'dname'=>'required',
            'description'=>'required',
            
        ]);

        $category = new Category([
            'dname' => $request->get('dname'),
            'description' => $request->get('description'),
           
        ]);
        $category->save();
        return redirect('/expensesCategory')->with('success', 'Data Successfully Added!');
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
        $category = category::find($id);
        return view('expensesCategory.update', compact('category'));   
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
            'dname'=>'required',
            'description'=>'required',
        ]);

        $category = category::find($id);
        $category->dname =  $request->get('dname');
        $category->description = $request->get('description');
        $category->save();
 
        return redirect('/expensesCategory')->with('success', 'Data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/expensesCategory')->with('success', ' Deleted!');
    }
}
