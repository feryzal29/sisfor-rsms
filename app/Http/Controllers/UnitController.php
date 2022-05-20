<?php

namespace App\Http\Controllers;

use App\Models\unit;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = unit::all();
        return view('master.unit',compact('unit'));
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
            'kode_unit'=>'required|unique:App\Models\unit,kode_unit',
            'nama_unit'=>'required'
        ]);   
        $unit = unit::create([
            'kode_unit' => $request->kode_unit,
            'nama_unit' => $request->nama_unit,
        ]);

        return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(unit $unit)
    {
        return view('master.unit_edit', $unit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, unit $unit)
    {
        $request->validate([
            'kode_unit'=>'required',
            'nama_unit'=>'required'
        ]);
        
        $unit->updateOrFail([
            'kode_unit'=>$request->kode_unit,
            'nama_unit'=>$request->nama_unit
        ]);
       
        return redirect()->back()->with(['success'=>'Data Berhasil diganti']);
    }

    public function delete($id){
        $unit = unit::find($id);
        $unit->delete();
        return redirect('unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(unit $unit)
    {
        //
    }
}
