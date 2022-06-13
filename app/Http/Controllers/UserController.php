<?php

namespace App\Http\Controllers;

use App\Models\MappingUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
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
        $users = User::all();
        return view('master.user',compact('users'));
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
            'email'=>'required|email|unique:App\Models\User,email',
            'nama'=>'required',
            'id_employee'=>'required|exists:App\Models\employee,id'
        ]);
        DB::beginTransaction();
        try {

            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password'=>Hash::make('12345678')
            ]);
            dd($user);
            $maping = MappingUser::create([
                'users_id'=>$user->id,
                'employees_id'=>$request->id_employee
            ]);

            $user->assignRole('user');

            DB::commit();
            return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['failed'=>$e]);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('master.user_edit', compact('user'));
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
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:App\Models\User,email,'.$user->id,
            'password'=>'nullable|min:8',
        ]);
        $user->name=$request->name;
        $user->email=$request->email;
        if(!empty($request->password)){
            $user->password=Hash::make($request->password);
        }

        $user->updateOrFail();

        return redirect('users')->with(['success'=>'Data Berhasil diganti']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return redirect('users')->with(['danger'=>'Data Berhasil Dihapus']);
    }
}
