<?php

namespace App\Http\Controllers;

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

        return view('master.employees_insert',
               compact('jenjang',
                       'kelompok',
                       'resiko',
                       'emergency',
                       'unit',
                       'bidang',
                       'wp',
                       'kerja',
                       'pendidikan'
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
        //
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
