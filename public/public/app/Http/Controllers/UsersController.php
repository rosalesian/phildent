<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Session;
use Auth;
use Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
                'user_name' => 'required|min:3',
                'email' => 'required',
                'password' => 'required|min:3',
                'role' => 'required'
            ]);
        $users = User::create([
                'user_name' => $request->user_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
        return redirect('dental/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
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
        $user = User::find($id);
        $user->update($request->all());
        return redirect('dental/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('delete', 'Successfully Deleted!...');
        return redirect('dental/users');
    }
    public function login()
    {
        return view('users.login');
    }
    public function requestLogin(Request $request)
    {
         $this->validate($request, [
                'email' => 'required',
                'password' => 'required'
            ]);
         //$password = Hash::make($request->password);

         $creadentials = $request->only('email', 'password');
         
         if(Auth::attempt($creadentials))
         {
            
            return redirect('dental/users');
         }
         else
         {
            return redirect('/')
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => 'These credential do not match our records']);
         }
       
    }
    public function getUsers()
    {
       $users = User::all();
       return Response::json([$users]);
        //return "Hello";
    }
}
