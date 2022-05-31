<?php

namespace App\Http\Controllers;

use App\Models\ResikoKerja;
use Illuminate\Http\Request;

class ResikoKerjaController extends Controller
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
        $resiko = ResikoKerja::all();
        return view('master.resiko_kerja',compact('resiko'));
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
            'kode_resiko'=>'required|alpha_num|unique:App\Models\ResikoKerja,kode_resiko',
            'nama_resiko'=>'required',
            'index'=>'required|numeric'
        ]);   
        $resiko = ResikoKerja::create([
            'kode_resiko' => $request->kode_resiko,
            'nama_resiko' => $request->nama_resiko,
            'index'=>$request->index
        ]);

        return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResikoKerja  $resikoKerja
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resiko = ResikoKerja::find($id);
        return view('master.resiko_edit', $resiko);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResikoKerja  $resikoKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(ResikoKerja $resikoKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResikoKerja  $resikoKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_resiko'=>'required',
            'nama_resiko'=>'required',
            'index'=>'required'
        ]);
        $resiko = ResikoKerja::findOrFail($id); 
          
        $resiko->updateOrFail([
            'kode_resiko'=>$request->kode_resiko,
            'nama_resiko'=>$request->nama_resiko,
            'index'=>$request->index
        ]);
       
        return redirect('resikokerja')->with(['success'=>'Data Berhasil diganti']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResikoKerja  $resikoKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resiko = ResikoKerja::findOrfail($id);
        $resiko->delete();
        return redirect('resikokerja');
    }
}
