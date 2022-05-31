<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
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
        $pendidikan = Pendidikan::all();
        return view('master.pendidikan',compact('pendidikan'));
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
            'tingkat'=>'required',
            'index'=>'required',
            'gapok1'=>'required',
            'kenaikan'=>'required',
            'maksimal'=>'required'
        ]);   
        $pendidikan = Pendidikan::create([
            'tingkat' => $request->tingkat,
            'index' => $request->index,
            'gapok1' => $request->gapok1,
            'kenaikan' => $request->kenaikan,
            'maksimal' => $request->maksimal,
        ]);

        return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        return view('master.pendidikan_edit', $pendidikan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        $request->validate([
            'tingkat'=>'required',
            'index'=>'required',
            'gapok1'=>'required',
            'kenaikan'=>'required',
            'maksimal'=>'required'
        ]);
        
        $pendidikan->updateOrFail([
            'tingkat' => $request->tingkat,
            'index' => $request->index,
            'gapok1' => $request->gapok1,
            'kenaikan' => $request->kenaikan,
            'maksimal' => $request->maksimal,
        ]);
       
        return redirect('pendidikan')->with(['success'=>'Data Berhasil diganti']);
    }

public function delete($id){
    $pendidikan = Pendidikan::find($id);
    $pendidikan->delete();
    return redirect('pendidikan');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendidikan $pendidikan)
    {
        //
    }
}
