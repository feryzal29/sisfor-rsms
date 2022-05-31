<?php

namespace App\Http\Controllers;

use App\Models\SetAplikasi;
use Illuminate\Http\Request;

class SetAplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $set = SetAplikasi::all();
        return view('setting.setapp',compact('set'));
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
            'moto'=>'required',
            'alamat'=>'required',
            'telp'=>'required',
            'email'=>'required',
        ]);

        $path = $request->file('logo')->store('files','public');
        $upload = SetAplikasi::create([
            'nama' => $request->nama,
            'moto' => $request->moto,
            'alamat' => $request->alamat,
            'no_telp' => $request->telp,
            'email' => $request->email,
            'logo' => $path,
        ]);
        return redirect()->back()->with(['success'=>'Set Aplikasi Berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SetAplikasi  $setAplikasi
     * @return \Illuminate\Http\Response
     */
    public function show(SetAplikasi $setAplikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SetAplikasi  $setAplikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(SetAplikasi $setAplikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SetAplikasi  $setAplikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SetAplikasi $setAplikasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SetAplikasi  $setAplikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(SetAplikasi $setAplikasi)
    {
        //
    }
}
