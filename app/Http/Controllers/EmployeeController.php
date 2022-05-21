<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Bidang;
use App\Models\employee;
use App\Models\JenjangJabatan;
use App\Models\KelompokJabatan;
use App\Models\Pendidikan;
use App\Models\ResikoKerja;
use App\Models\SttsKerja;
use App\Models\SttsWp;
use App\Models\unit;
use App\Models\UnitEmergency;
use Illuminate\Http\Request;
use PDO;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = employee::with([
                'jenjang',
                'kelompok',
                'emergency',
                'resiko',
                'unit',
                'bidang',
                'stts_wp',
                'bank',
                'pendidikan',
                'indexing',
                'stts_kerja',
                'emergency'
        ])->get();
        return view('master.employees',compact('employee'));
    }

    public function insertdata(){
        $jenjang = JenjangJabatan::all();
        $kelompok = KelompokJabatan::all();
        $resiko = ResikoKerja::all();
        $emergency = UnitEmergency::all();
        $unit = unit::all();
        $bidang = Bidang::all();
        $wp = SttsWp::all();
        $kerja = SttsKerja::all();
        $pendidikan = Pendidikan::all();
        $bank = Bank::all();

        return view('master.employees_insert',
               compact('jenjang',
                       'kelompok',
                       'resiko',
                       'emergency',
                       'unit',
                       'bidang',
                       'wp',
                       'kerja',
                       'pendidikan',
                       'bank'
                    ));
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
            'nip'=>'required',
            'nama'=>'required',
            'jk'=>'required',
            'jabatan'=>'required',
            'jenjang'=>'required',
            'kelompok'=>'required',
            'resiko'=>'required',
            'emergency'=>'required',
            'unit'=>'required',
            'bidang'=>'required',
            'wp'=>'required',
            'kerja'=>'required',
            'npwp'=>'required',
            'pendidikan'=>'required',
            'gapok'=>'required',
            'lahir'=>'required',
            'tgl_lahir'=>'required',
            'alamat'=>'required',
            'kota'=>'required',
            'mulai_kerja'=>'required',
            'ms_kerja'=>'required',
            'indexings'=>'required',
            'bank'=>'required',
            'rekening'=>'required',
            'stts_aktif'=>'required',
            'masuk'=>'required',
            'pengurangan'=>'required',
            'index'=>'required',
            'mulai_kontrak'=>'required',
            'cuti'=>'required',
            'dankes'=>'required',
            'no_ktp'=>'required',
        ]);

        $tgl_lahir = $request->tgl_lahir;
        $tgl_lahirstr = date('Y-m-d',strtotime($tgl_lahir));

        $mulai_kerja = $request->mulai_kerja;
        $mulai_kerjastr = date('Y-m-d',strtotime($mulai_kerja));

        $kontrak = $request->mulai_kontrak;
        $kontrakstr = date('Y-m-d',strtotime($kontrak));

        $employee = employee::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'jbtn' => $request->jabatan,
            'kode_jenjang' => $request->jenjang,
            'kode_kelompok' => $request->kelompok,
            'kode_resiko' => $request->resiko,
            'kode_emergency' => $request->emergency,
            'kode_unit' => $request->unit,
            'id_bidangs' => $request->bidang,
            'stts_wp' => $request->wp,
            'stts_kerja' => $request->kerja,
            'npwp' => $request->npwp,
            'id_pendidikans' => $request->pendidikan,
            'gapok' => $request->gapok,
            'tgl_lahir'=>$tgl_lahirstr,
            'tmp_lahir' => $request->lahir,
            'alamat'=> $request->alamat,
            'kota'=> $request->kota,
            'mulai_kerja' => $mulai_kerjastr,
            'ms_kerja' => $request->ms_kerja,
            'indexings' => $request->indexings,
            'id_banks' => $request->bank,
            'rekening' => $request->rekening,
            'stts_aktif' => $request->stts_aktif,
            'wajib_masuk' => $request->masuk,
            'pengurangan' => $request->pengurangan,
            'index' => $request->index,
            'mulai_kontrak' => $kontrakstr,
            'cuti_diambil' => $request->cuti,
            'dankes' => $request->dankes,
            'no_ktp' => $request->no_ktp
        ]);

        return redirect('employees')->with(['success'=>'Data Berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
        //
    }
}
