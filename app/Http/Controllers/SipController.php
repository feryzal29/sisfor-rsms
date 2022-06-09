<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\Sip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
            'no_sip'=>'required',
            'tgl_terbit'=>'required',
            'tgl_ed'=>'required'
        ]);
        DB::beginTransaction();
        try {
            $tgl_terbit = $request->tgl_terbit;
            $tgl_terbitstr = date('Y-m-d',strtotime($tgl_terbit));

            $tgl_ed = $request->tgl_ed;
            $tgl_edstr = date('Y-m-d',strtotime($tgl_ed));

            $str = Sip::create([
                'employee_id'=> $request->employee_id,
                'no_sip'=>$request->no_sip,
                'tgl_terbit'=>$tgl_terbitstr,
                'tgl_ed'=>$tgl_edstr
            ]);
            DB::commit();
            return redirect('/employees')->with(['success'=>'Data SIP Berhasil Ditambah']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error'=>'Data SIP Hanya Bisa di update atau dihapus']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sip  $sip
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = employee::findOrFail($id);
        $sip = Sip::where('employee_id',$id)->get();
        return view('sdi.sip',compact('employee','sip'));
    }

    public function showUpdate($id){
        $sip = Sip::findOrFail($id);
        return view('sdi.sip_edit',compact('sip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sip  $sip
     * @return \Illuminate\Http\Response
     */
    public function edit(Sip $sip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sip  $sip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sip $sip)
    {
        $request->validate([
            'no_sip'=>'required',
            'tgl_terbit'=>'required',
            'tgl_ed'=>'required'
        ]);
            $tgl_terbit = $request->tgl_terbit;
            $tgl_terbitstr = date('Y-m-d',strtotime($tgl_terbit));

            $tgl_ed = $request->tgl_ed;
            $tgl_edstr = date('Y-m-d',strtotime($tgl_ed));

        $sip->updateOrFail([
            'no_sip'=>$request->no_sip,
            'tgl_terbit'=>$tgl_terbitstr,
            'tgl_ed'=>$tgl_edstr
        ]);
       
        return redirect('/employees')->with(['success'=>'Data Berhasil diganti']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sip  $sip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Sip::findOrfail($id);
        $employee->delete();
        return redirect('/employees');
    }
}
