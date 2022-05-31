<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class AlarmController extends Controller
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
    public function AlarmOriented(){
        $current = Carbon::now();
        // $employee = DB::table('employees')
        //                     ->where('mulai_kontrak','>',$current)
        //                     ->get();
        
        $employees = employee::where('stts_kerja','Or')->where('stts_aktif','AKTIF')->get();
        foreach($employees as $item){
            $now = Carbon::now();
            $emp = Carbon::parse($item->mulai_kontrak)->diffInDays();
            
            if($emp > 80){
                $details = employee::where('stts_kerja','Or')->where('stts_aktif','AKTIF')->get();
                Mail::to('mferyzalfahlevi29@gmail.com')->send(new \App\Mail\AlarmOrientasiMail($details));
                dd('Berhasil dikirim');
            } else {
                dd('gagal');
            }
            // if($item->selesai_kontrak >= $now){
            //     $details = [
            //         'nama'=>$item->nama,
            //         'jbtn'=>$item->jbtn,
            //         'selesai_kontrak'=>$item->selesai_kontrak
            //     ];
            //     Mail::to('mferyzalfahlevi29@gmail.com')->send(new \App\Mail\AlarmOrientasiMail($details));
            // } else {
            //     echo "kosong";
            // }
        }
            // $employee =  $item->selesai_kontrak;
            // $today = Carbon::now();
            // $ttl = $today - $employee;
        // $emp = employee::all('mulai_kontrak')->map(function ($item){
        //     $sisa = $item->mulai_kontrak;
        //     $today = Carbon::parse($sisa)->diffInDays(Carbon::today(), false);
        //     return $today;
        // });
        // dd($emp);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
