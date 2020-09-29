<?php

namespace App\Http\Controllers;
use App\users;
use Illuminate\Http\Request;

class UsersControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = users::all();
        return view('users')->with('users',$users);
    }
   // public function users()
  //  {
      //  return view('users');
  //  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'fullname' => ['required', 'string', 'max:255'],
            //'roles' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],


        ]);
        
        $users = new users;
        $users->name = $request->input('fullname');
       // $users->roles = $request->input('roles');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        //password' => Hash::make($data['password'])

        $users->save();
        return redirect('/users')->with('succes', 'Data Saved');

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
        $users = users::find($id);
        $users->delete();

        return redirect('/users')->with('success', ' Deleted!');
    }
}
