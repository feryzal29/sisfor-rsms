<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use App\Models\JenisKegiatan;
use App\Models\unit;
use Illuminate\Http\Request;

class DiklatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Diklat::with([
            'unit',
            'kegiatan'
        ])->get();
        $diklat = Diklat::all();
        $unit = unit::all();
        $jenis = JenisKegiatan::all();
        return view('diklat.diklat',compact('diklat','unit','jenis','data'));
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
            'units_id'=>'required',
            'nama'=>'required',
            'jenis_kegiatans_id'=>'required',
            'tempat'=>'required',
            'tanggal'=>'required'
        ]);   

        $tgl = $request->tanggal;
        $tgl_str = date('Y-m-d',strtotime($tgl));

        $diklat = Diklat::create([
            'units_id' => $request->units_id,
            'nama' => $request->nama,
            'jenis_kegiatans_id' => $request->jenis_kegiatans_id,
            'tempat' => $request->tempat,
            'tanggal' => $tgl_str
        ]);

        return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diklat  $diklat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = unit::all();
        $jenis = JenisKegiatan::all();

        $diklat = Diklat::findOrFail($id);
        $diklat->load([
            'unit',
            'kegiatan'   
        ]);

        return view(
            'diklat.diklat_edit',
            compact(
                'unit',
                'jenis',
                'diklat' 
            ));
    }

    public function showAbsensi(){
        return view('diklat.absensi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diklat  $diklat
     * @return \Illuminate\Http\Response
     */
    public function edit(Diklat $diklat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diklat  $diklat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diklat $diklat)
    {
        $request->validate([
            'units_id'=>'required',
            'nama'=>'required',
            'jenis_kegiatans_id'=>'required',
            'tempat'=>'required',
            'tanggal'=>'required|date_format:d/m/Y'
        ]);

        $diklat->updateOrFail([
            'units_id'=>$request->units_id,
            'nama'=>$request->nama,
            'jenis_kegiatans_id'=>$request->jenis_kegiatans_id,
            'tempat'=>$request->tempat,
            'tanggal'=>date('Y-m-d', strtotime(str_replace('/', '-', $request->tanggal))),
        ]);
       
        return redirect('diklat')->with(['success'=>'Data Berhasil diganti']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diklat  $diklat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diklat = Diklat::findOrfail($id);
        $diklat->delete();
        return redirect('/diklat');
    }
}
