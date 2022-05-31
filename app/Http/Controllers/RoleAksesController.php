<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleAksesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        return view('users.role_permission',compact('role'));
    }

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
        $request->validate([
            'name'=>'required',
            'guard_name'=>'required',
        ]); 

        $role = Role::create([
            'name' => $request->name,
            'guard_name'=>$request->guard_name
        ]);

        return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
    }

    public function addUserPermission(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'roles' => 'required'            
        ]);
        $user = User::findOrFail($request->id_user);
        $user->assignRole([$request->roles]);

        return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = User::findOrFail($id);
        $role = Role::whereNotIn('name', $user->getRoleNames())->get();
        return view('users.role_add',compact('role','user'));
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
        $diklat = Role::findOrfail($id);
        $diklat->delete();
        return redirect()->back()->with(['success'=>'Data Berhasil dihapus']);
    }

    public function deleteUserRole(Request $request){
        $request->validate([
            'user_id' => 'required',
            'role' => 'required'            
        ]);
        $user = User::findOrFail($request->user_id);
        $user->removeRole($request->role);

        return redirect()->back()->with(['success'=>'Data Berhasil dihapus']);
    }
}
