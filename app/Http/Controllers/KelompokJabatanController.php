<?php

namespace App\Http\Controllers;

use App\Models\KelompokJabatan;
use Illuminate\Http\Request;

class KelompokJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelompok = KelompokJabatan::all();
        return view('master.kelompok',compact('kelompok'));
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
            'kode_kelompok'=>'required|unique:App\Models\KelompokJabatan,kode_kelompok',
            'nama_kelompok'=>'required',
            'index'=>'required'
        ]);   
        $kelompok = KelompokJabatan::create([
            'kode_kelompok' => $request->kode_kelompok,
            'nama_kelompok' => $request->nama_kelompok,
            'index'=>$request->index
        ]);

        return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KelompokJabatan  $kelompokJabatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $jabatan = KelompokJabatan::find($id);
        return view('master.kelompok_edit', $jabatan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KelompokJabatan  $kelompokJabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(KelompokJabatan $kelompokJabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KelompokJabatan  $kelompokJabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kelompok'=>'required',
            'nama_kelompok'=>'required',
            'index'=>'required'
        ]);

        $kelompokJabatan = KelompokJabatan::findOrFail($id); 
          
        $kelompokJabatan->updateOrFail([
            'kode_kelompok'=>$request->kode_kelompok,
            'nama_kelompok'=>$request->nama_kelompok,
            'index'=>$request->index
        ]);
       
        return redirect('kelompok')->with(['success'=>'Data Berhasil diganti']);
    }

    // public function delete($id){
    //     $kelompok = KelompokJabatan::find($id);
    //     $kelompok->delete();
    //     return redirect('kelompok');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KelompokJabatan  $kelompokJabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelompok = KelompokJabatan::findOrfail($id);
        $kelompok->delete();
        return redirect('kelompok');
    }
}
