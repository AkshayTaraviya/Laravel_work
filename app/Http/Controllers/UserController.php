<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use function PHPSTORM_META\map;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data'=>User::get(), 
            'success'=>true,
            'message'=>'user get successfully'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $roles = Role::all();
        // return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
 
        $user->save();
        return response()->json([ 
            'data'=>$user,
            'success'=>true,
            'message'=>'User Created'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        if($user){
            return response()->json([ 
                'data'=>$user,
                'success'=>true,
            ]);
        }else{
            return response()->json([ 
                'data'=>$user,
                'success'=>false,
                'message'=>'User Not found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::all();
        $user = User::where('id', $id)->first();
        return view('users.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::where('id', $id)->first();

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return response()->json([ 
            'data'=>$user,
            'success'=>true,
            'message'=>'Update Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $user = User::find($id);
       $user->delete();
       return response()->json([
        'data'=>$user,
        'message'=>'User Deleted'
       ]);
    }
}

