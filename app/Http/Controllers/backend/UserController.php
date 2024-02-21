<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = User::with('role')->get();
        $roles = Role::all();

        return view('backend.pages.user.index', compact('data', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.pages.user.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'role_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            
        ],[
            'role_id.required' => 'must select role',
        ]);

        $user = new User();

        $user->role_id = $validatedData['role_id'];
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt( $validatedData['password']);
        

        $user->save();

        return redirect()->route('backend.user.index')->with('status', 'User added');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $roles = Role::all(); 
            $user = User::findOrFail($id);
    
            return view('backend.pages.user.edit', compact('roles', 'user')); 
        } catch (ModelNotFoundException $e) {
            return redirect()->route('backend.user.index')->with('error', 'User not found');
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'role_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,',
        ]);
        
        $user = User::findOrFail($id);
    
        $user->role_id = $validatedData['role_id'];
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
    
        $user->save();
    
        return redirect()->route('backend.user.index')->with('status', 'User is Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('backend.user.index');
    }
}
