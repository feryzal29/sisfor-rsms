<?php

namespace App\Http\Controllers;

use App\Models\UnitEmergency;
use Illuminate\Http\Request;

class UnitEmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emergency = UnitEmergency::all();
        return view('master.emergency',compact('emergency'));
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
            'kode'=>'required|alpha_num|unique:App\Models\UnitEmergency,kode',
            'nama'=>'required',
            'index'=>'required|numeric'
        ]);   
        $resiko = UnitEmergency::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'index'=>$request->index
        ]);

        return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitEmergency  $unitEmergency
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emergency = UnitEmergency::find($id);
        return view('master.emergency_edit', $emergency);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitEmergency  $unitEmergency
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitEmergency $unitEmergency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnitEmergency  $unitEmergency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode'=>'required',
            'nama'=>'required',
            'index'=>'required'
        ]);
        $emergency = UnitEmergency::findOrFail($id); 
          
        $emergency->updateOrFail([
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'index'=>$request->index
        ]);
       
        return redirect('emergencies')->with(['success'=>'Data Berhasil diganti']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitEmergency  $unitEmergency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emergency = UnitEmergency::findOrfail($id);
        $emergency->delete();
        return redirect('emergencies');
    }
}
