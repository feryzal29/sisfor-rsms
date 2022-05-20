<?php

namespace App\Http\Controllers;

use App\Models\SttsKerja;
use Illuminate\Http\Request;

class SttsKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kerja = SttsKerja::all();
        return view('master.stts_kerja',compact('kerja'));
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
            'stts'=>'required|unique:App\Models\SttsWp,stts',
            'kategori'=>'required',
        ]);   
        $kerja = SttsKerja::create([
            'stts' => $request->stts,
            'kategori' => $request->kategori
        ]);

        return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SttsKerja  $sttsKerja
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kerja = SttsKerja::find($id);
        return view('master.stts_kerja_edit', $kerja);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SttsKerja  $sttsKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(SttsKerja $sttsKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SttsKerja  $sttsKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'stts'=>'required',
            'kategori'=>'required',
        ]);
        $wp = SttsKerja::findOrFail($id); 
          
        $wp->updateOrFail([
            'stts'=>$request->stts,
            'kategori'=>$request->kategori
        ]);
       
        return redirect('sttskerja')->with(['success'=>'Data Berhasil diganti']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SttsKerja  $sttsKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wp = SttsKerja::findOrfail($id);
        $wp->delete();
        return redirect('sttskerja');
    }
}
