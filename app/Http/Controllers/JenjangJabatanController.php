<?php

namespace App\Http\Controllers;

use App\Models\JenjangJabatan;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class JenjangJabatanController extends Controller
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
        $jenjang = JenjangJabatan::all();
        return view('master.jenjang',compact('jenjang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'kode_jenjang'=>'required|alpha_num|unique:App\Models\JenjangJabatan,kode_jenjang',
            'nama_jenjang'=>'required',
            'tunjangan'=>'required|numeric',
            'index'=>'required|numeric'
        ]);   
        $jenjangJabatan = JenjangJabatan::create([
            'kode_jenjang' => $request->kode_jenjang,
            'nama_jenjang' => $request->nama_jenjang,
            'tunjangan' => $request->tunjangan,
            'index'=>$request->index
        ]);

        return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenjangJabatan  $jenjangJabatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenjang = JenjangJabatan::find($id);
        return view('master.jenjang_edit', $jenjang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenjangJabatan  $jenjangJabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenjangJabatan  $jenjangJabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_jenjang'=>'required',
            'nama_jenjang'=>'required',
            'tunjangan'=>'required',
            'index'=>'required'
        ]);
        $jenjang = JenjangJabatan::findOrFail($id); 
          
        $jenjang->updateOrFail([
            'kode_jenjang'=>$request->kode_jenjang,
            'nama_jenjang'=>$request->nama_jenjang,
            'tunjangan'=>$request->tunjangan,
            'index'=>$request->index
        ]);
       
        return redirect('jenjang')->with(['success'=>'Data Berhasil diganti']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenjangJabatan  $jenjangJabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenjang = JenjangJabatan::findOrfail($id);
        $jenjang->delete();
        return redirect('jenjang');
    }
}
