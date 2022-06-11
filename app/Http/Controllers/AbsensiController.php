<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Diklat;
use App\Models\employee;
use DateTime;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
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
            'diklat_id' => 'required|numeric|exists:App\Models\Diklat,id',
            'nip'=> 'required|exists:App\Models\employee,nip'
        ]);

        $employee =  employee::whereNip($request->nip)->firstOrFail();

        $absen = Absensi::where([
            'employee_id'=>$employee->id,
            'diklat_id'=>$request->diklat_id,
            'date'=>date('Y-m-d',strtotime(now()))
        ])->first();

        if (!empty($absen)) {
            return redirect()->back()->with(['success'=>'Sudah absen masuk.']);
        }

        $absen = new Absensi();
        
        $absen->fill([
            'diklat_id'=>$request->diklat_id,
            'employee_id'=>$employee->id,
            'masuk_at'=>now(),
            'date'=>date('Y-m-d',strtotime(now()))
        ]);

        $absen->saveOrFail();

        return redirect()->back()->with(['success'=>'Absen Masuk']);
    }

    public function manual(Request $request){
        $request->validate([
            'diklat' => 'required',
            'id'=> 'required'
        ]);

        $masuk =  date('Y-m-d H:i:s',strtotime($request->masuk));

        $selesai = date('Y-m-d H:i:s',strtotime($request->selesai));

        $ttl = Carbon::parse($masuk)->diffInHours($selesai, ['syntax' => 1, 'parts' => 1]);

        $id = $request->id;
        
        foreach($id as $item){
            $absensi = Absensi::create([
                'diklat_id'=>$request->diklat,
                'employee_id'=>$item,
                'masuk_at'=>$masuk,
                'selesai_at'=>$selesai,
                'total_waktu'=>$ttl
            ]);
        }
        
        return redirect()->back()->with(['success'=>'Absen Berhasil DItambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $request->validate([
            'diklat_id' => 'required|numeric|exists:App\Models\Diklat,id',
            'nip'=> 'required|exists:App\Models\employee,nip'
        ]);

        $employee =  employee::whereNip($request->nip)->firstOrFail();;
        
        $absen = Absensi::where([
            'employee_id'=>$employee->id,
            'diklat_id'=>$request->diklat_id,
            'date'=>date('Y-m-d',strtotime(now()))
        ])->firstOrFail();

        $absen->updateOrfail([
            'selesai_at'=>now(),
            'total_waktu'=>Carbon::parse($absen->masuk_at)->diffInHours(now(), ['syntax' => 1, 'parts' => 1])
        ]);

        return redirect()->back()->with(['success'=>'Absen Pulang Selesai']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absen = Absensi::findOrfail($id);
        $absen->delete();
        return redirect()->back()->with(['success'=>'Data Berhasil Dihapus']);
    }
}
