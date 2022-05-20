<?php

namespace App\Http\Controllers;

use App\Models\SttsWp;
use Illuminate\Http\Request;

class SttsWpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wp = SttsWp::all();
        return view('master.stts_wp',compact('wp'));
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
            'stts'=>'required|unique:App\Models\SttsWp,stts',
            'kategori'=>'required',
        ]);   
        $wp = SttsWp::create([
            'stts' => $request->stts,
            'kategori' => $request->kategori
        ]);

        return redirect()->back()->with(['success'=>'Data Berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SttsWp  $sttsWp
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wp = SttsWp::find($id);
        return view('master.stts_wp_edit', $wp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SttsWp  $sttsWp
     * @return \Illuminate\Http\Response
     */
    public function edit(SttsWp $sttsWp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SttsWp  $sttsWp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'stts'=>'required',
            'kategori'=>'required',
        ]);
        $wp = SttsWp::findOrFail($id); 
          
        $wp->updateOrFail([
            'stts'=>$request->stts,
            'kategori'=>$request->kategori
        ]);
       
        return redirect('statuswp')->with(['success'=>'Data Berhasil diganti']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SttsWp  $sttsWp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wp = SttsWp::findOrfail($id);
        $wp->delete();
        return redirect('statuswp');
    }
}
