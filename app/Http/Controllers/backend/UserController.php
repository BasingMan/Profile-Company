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

    public function dashboard()
    {
        return view('backend.pages.dashboard.index');
    }

    public function userdashboard()
    {
        return view('backend.pages.dashboard.user');
    }
    public function index()
    {
        
        $data = User::with('role')->paginate(5);
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

            return redirect()->route('backend.user.index')->with([
                'alert'=>'success',
                'message'=>'Successfully Create',
            ]);

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
            return redirect()->route('backend.user.index')->with([
                'alert'=>'success',
                'message'=>$e->getMessage(),
            ]);;
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        if ($request->has('role_id') && $request->input('role_id') != $user->role_id) {
            $validatedData['role_id'] = $request->input('role_id');
        }

        $user->update($validatedData);

        return redirect()->route('backend.user.index')->with([
            'alert' => 'success',
            'message' => 'User updated successfully',
        ]);
    } catch (ModelNotFoundException $e) {
        return redirect()->route('backend.user.index')->with([
            'alert' => 'success',
            'message' => $e->getMessage(),
        ]);
    } catch (\Exception $e) {
        return redirect()->back()->with([
            'alert' => 'success',
            'message' => $e->getMessage(),
        ]);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            User::findOrFail($id)->delete();

            return redirect()->route('backend.user.index')->with([
                'alert'=>'success',
                'message'=>'Successfully deleted',
            ]);;
        }catch(\Exception $e){
            return redirect()->back()->with([
                'alert'=>'success',
                'message'=>$e->getMessage(),
            ]);
        }
    }
}
