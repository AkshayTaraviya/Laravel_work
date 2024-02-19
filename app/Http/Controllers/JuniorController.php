<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Junior;
use Illuminate\Http\Request;

class JuniorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('juniors.index',[
            'juniors' => Junior::get() 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('juniors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user'=>'required',
            'email' => 'required',  
            'role' => 'required', 
            'password'=>'required'
        ]);

        $junior = new Junior;
        $junior->user = $request->user;
        $junior->email = $request->email;
        $junior->role = $request->role;
        $junior->password = $request->password;

        $junior->save();

        return redirect()->to('/juniors');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $junior = junior::where('id', $id)->first();
        return view('juniors.edit',['junior'=>$junior]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        $junior = junior::where('id',$id)->first();
        
        $junior->user = $request->user;
        $junior->email = $request->email;
        $junior->role = $request->role;

        $junior->save();

        return back()->withSuccess('User Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $junior = junior::where('id', $id)->first();
        $junior->delete();
        return back()->withSuccess('User Deleted');
    }
    
}
