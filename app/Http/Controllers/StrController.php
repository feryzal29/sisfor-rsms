<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrController extends Controller
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
            'no_str'=>'required',
            'tgl_terbit'=>'required',
            'tgl_ed'=>'required'
        ]);
        DB::beginTransaction();
        try {
            $tgl_terbit = $request->tgl_terbit;
            $tgl_terbitstr = date('Y-m-d',strtotime($tgl_terbit));

            $tgl_ed = $request->tgl_ed;
            $tgl_edstr = date('Y-m-d',strtotime($tgl_ed));

            $str = Str::create([
                'employee_id'=> $request->employee_id,
                'no_str'=>$request->no_str,
                'tgl_terbit'=>$tgl_terbitstr,
                'tgl_ed'=>$tgl_edstr
            ]);
            DB::commit();
            return redirect()->back()->with(['success'=>'Data STR Berhasil Ditambah']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['error'=>'Data STR Hanya Bisa di update atau dihapus']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Str  $str
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = employee::findOrFail($id);
        $str = Str::where('employee_id',$id)->get();
        return view('sdi.str',compact('str','employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Str  $str
     * @return \Illuminate\Http\Response
     */

    public function showUpdate($id){
        $str = Str::findOrFail($id);
        return view('sdi.str_edit',compact('str'));
    }
    
    public function edit(Str $str)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Str  $str
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Str $str)
    {
        $request->validate([
            'no_str'=>'required',
            'tgl_terbit'=>'required',
            'tgl_ed'=>'required'
        ]);
            $tgl_terbit = $request->tgl_terbit;
            $tgl_terbitstr = date('Y-m-d',strtotime($tgl_terbit));

            $tgl_ed = $request->tgl_ed;
            $tgl_edstr = date('Y-m-d',strtotime($tgl_ed));

        $str->updateOrFail([
            'no_str'=>$request->no_str,
            'tgl_terbit'=>$tgl_terbitstr,
            'tgl_ed'=>$tgl_edstr
        ]);
       
        return redirect('/employees')->with(['success'=>'Data Berhasil diganti']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Str  $str
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Str::findOrfail($id);
        $employee->delete();
        return redirect('/employees');
    }
}
