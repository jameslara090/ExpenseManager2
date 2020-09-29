<?php

namespace App\Http\Controllers;
use App\expenses;
use Illuminate\Http\Request;

class expensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = expenses::all();

        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.create');
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
            'ex_category'=>'required',
            'amount'=>'required',
            'entry_date'=>'required',
            
        ]);

        $expenses = new expenses([
            'ex_category' => $request->get('ex_category'),
            'amount' => $request->get('amount'),
            'entry_date' => $request->get('entry_date'),
           
        ]);
        $expenses->save();
        return redirect('/expenses')->with('success', 'Data Successfully Added!');
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
        $expenses = expenses::find($id);
        return view('expenses.update', compact('expenses'));   
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
            'ex_category'=>'required',
            'amount'=>'required',
            'entry_date'=>'required',
        ]);

        $expenses = expenses::find($id);
        $expenses->ex_category =  $request->get('ex_category');
        $expenses->amount = $request->get('amount');
        $expenses->entry_date = $request->get('entry_date');
        $expenses->save();
 
        return redirect('/expenses')->with('success', 'Data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expenses = expenses::find($id);
        $expenses->delete();

        return redirect('/expenses')->with('Data', ' Deleted!');
    }
}
