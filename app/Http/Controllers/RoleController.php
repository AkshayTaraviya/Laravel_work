<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\role;
use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('roles.index',[
            'roles' => Role::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role'=>'required',
        ]);

        $Role = new Role;
        $Role->role = $request->role;

        $Role->save();

        return redirect()->to('/roles');
    }

    /**
     * Display the specified resource.
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = role::where('id',$id)->first();
        return view('roles.edit',['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'role' => 'required'
        ]);

        $Role = Role::where('id', $id)->first();

        $Role->role = $request->role;

        $Role->save();

        return back()->withSuccess('Role Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = book::where('id',$id)->first();
        $role->delete();
        return back()->withSuccess('Role Deleted!!');
    }
}
