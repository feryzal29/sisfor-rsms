<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\employees_cuti;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'employee_id'=>'required',
            'pj_terkait'=>'required',
            'kabag_umum'=>'required',
            'pengganti'=>'required',
            'tgl_pengajuan'=>'required',
            'tgl_awal'=>'required',
            'tgl_akhir'=>'required',
            'status'=>'required',
            'jenis_cuti'=>'required',
            'alamat_tujuan'=>'required',
            'kepengingan_cuti'=>'required',
        ]);

        DB::beginTransaction();

        try {

            $tgl_pengajuan = $request->tgl_pengajuan;
            $tgl_pengajuan = str_replace('/', '-', $tgl_pengajuan);
            $date_pengajuan = date('Y-m-d', strtotime($tgl_pengajuan));
        
            $tgl_awal = $request->tgl_awal;
            $tgl_awal = str_replace('/', '-', $tgl_awal);
            $date_awal = date('Y-m-d', strtotime($tgl_awal));

            $tgl_akhir = $request->tgl_akhir;
            $tgl_akhir = str_replace('/', '-', $tgl_akhir);
            $date_akhir = date('Y-m-d', strtotime($tgl_akhir));

            $jml_cuti = Carbon::parse($date_awal)->diffInDays($date_akhir, ['syntax' => 1, 'parts' => 1]);

            $cuti = employees_cuti::create([
                'employee_id' => $request->employee_id,
                'pj_terkait' => $request->pj_terkait,
                'kabag_umum' => $request->kabag_umum,
                'pengganti' => $request->pengganti,
                'tgl_pengajuan' => $date_pengajuan,
                'tgl_awal' => $date_awal,
                'tgl_akhir' => $date_akhir,
                'jml_cuti' => $jml_cuti,
                'status' => $request->status,
                'jenis_cuti' => $request->jenis_cuti,
                'alamat_tujuan' => $request->alamat_tujuan,
                'kepengingan_cuti' => $request->kepengingan_cuti
            ]);

            if($request->status == "disetujui"){
                $employee2 = employee::findOrFail($request->employee_id); 
                $employee2->updateOrFail([
                    'stts_aktif' => 'CUTI',
                ]);
            }
            DB::commit();

           return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error'=>'Terjadi kesalahan pada data',$th]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employees_cuti  $employees_cuti
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = employee::findOrFail($id);
        $emp = employee::all();
        $cuti = employees_cuti::with([
            'employee',
            'pj',
            'kabag',
            'pg'
    ])->get();
        return view('master.employees_cuti',compact('employee','emp','cuti'));
    }

    public function showupdate($id){
        $cuti = employees_cuti::findOrFail($id);
        $cuti->load([
            'employee',
            'pj',
            'kabag',
            'pg'
        ]);
       
        $emp = employee::all();
        return view('master.employees_cuti_edit',compact('cuti','emp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employees_cuti  $employees_cuti
     * @return \Illuminate\Http\Response
     */
    public function edit(employees_cuti $employees_cuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employees_cuti  $employees_cuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'pj_terkait'=>'required',
                'kabag_umum'=>'required',
                'pengganti'=>'required',
                'tgl_pengajuan'=>'required',
                'tgl_awal'=>'required',
                'tgl_akhir'=>'required',
                'status'=>'required',
                'jenis_cuti'=>'required',
                'alamat_tujuan'=>'required',
                'kepengingan_cuti'=>'required',
            ]);
    
            $tgl_pengajuan = $request->tgl_pengajuan;
            $tgl_pengajuan = str_replace('/', '-', $tgl_pengajuan);
            $date_pengajuan = date('Y-m-d', strtotime($tgl_pengajuan));
        
            $tgl_awal = $request->tgl_awal;
            $tgl_awal = str_replace('/', '-', $tgl_awal);
            $date_awal = date('Y-m-d', strtotime($tgl_awal));

            $tgl_akhir = $request->tgl_akhir;
            $tgl_akhir = str_replace('/', '-', $tgl_akhir);
            $date_akhir = date('Y-m-d', strtotime($tgl_akhir));

            $jml_cuti = Carbon::parse($date_awal)->diffInDays($date_akhir, ['syntax' => 1, 'parts' => 1]);

            $cuti = employees_cuti::find($id);
            
            if(empty($cuti)){
                abort(404);
            }

            $cuti->update([
                'pj_terkait' => $request->pj_terkait,
                'kabag_umum' => $request->kabag_umum,
                'pengganti' => $request->pengganti,
                'tgl_pengajuan' => $date_pengajuan,
                'tgl_awal' => $date_awal,
                'tgl_akhir' => $date_akhir,
                'jml_cuti' => $jml_cuti,
                'status' => $request->status,
                'jenis_cuti' => $request->jenis_cuti,
                'alamat_tujuan' => $request->alamat_tujuan,
                'kepengingan_cuti' => $request->kepengingan_cuti
            ]);

            if($request->status == "disetujui"){
                $employee2 = employee::find($request->employee_id); 
                $employee2->update([
                    'stts_aktif' => 'CUTI',
                ]);
            } else if($request->status != "disetujui") {
                $employee2 = employee::find($request->employee_id); 
                $employee2->update([
                    'stts_aktif' => 'AKTIF',
                ]);
            }
            DB::commit();

           return redirect()->back()->with(['success'=>'Data Berhasil diganti']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error'=>'Terjadi kesalahan pada data',$th]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employees_cuti  $employees_cuti
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuti = employees_cuti::findOrfail($id);
        $cuti->delete();
        return redirect()->back()->with(['success'=>'Data Berhasil dihapus']);
    }
}
