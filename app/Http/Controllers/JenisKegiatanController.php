<?php

namespace App\Http\Controllers;

use App\Models\JenisKegiatan;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class JenisKegiatanController extends Controller
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
        $kegiatan = JenisKegiatan::all();
        return view('master.diklat.jenis_kegiatan',compact('kegiatan'));
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
            'nama'=>'required',
            'keterangan'=>'required'
        ]);

        $jenis = JenisKegiatan::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisKegiatan  $jenisKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenis = JenisKegiatan::find($id);
        return view('master.diklat.jenis_kegiatan_edit', compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisKegiatan  $jenisKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisKegiatan $jenisKegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisKegiatan  $jenisKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=>'required',
            'keterangan'=>'required'
        ]);
        $jenis = JenisKegiatan::findOrFail($id); 
          
        $jenis->updateOrFail([
            'nama'=>$request->nama,
            'keterangan'=>$request->keterangan
        ]);
       
        return redirect('jeniskegiatan')->with(['success'=>'Data Berhasil diganti']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisKegiatan  $jenisKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis = JenisKegiatan::findOrfail($id);
        $jenis->delete();
        return redirect('jeniskegiatan');
    }
}
