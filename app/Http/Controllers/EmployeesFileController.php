<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\EmployeesFile;
use Illuminate\Http\Request;

class EmployeesFileController extends Controller
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
        //
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
            'path'=>'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048',
            'employee_id'=>'required',
            'nama'=>'required'
        ]);  

        $path = $request->file('path')->store('files','public');
        $upload = EmployeesFile::create([
            'employee_id' => $request->employee_id,
            'path' => $path,
            'nama' => $request->nama
        ]);
        
        return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeesFile  $employeesFile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = employee::findOrFail($id);
        return view('sdi.employee_files',compact('id','employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeesFile  $employeesFile
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeesFile $employeesFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeesFile  $employeesFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeesFile $employeesFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeesFile  $employeesFile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = EmployeesFile::findOrfail($id);
        $employee->delete();
        return redirect()->back()->with(['success'=>'Data Berhasil dihapus']);
    }
}
