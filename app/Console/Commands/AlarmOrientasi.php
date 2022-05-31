<?php

namespace App\Console\Commands;

use App\Models\employee;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Listeners\LogScheduledTaskStarting;

class AlarmOrientasi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:orientasi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Alarm Kontrak Orientasi';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function __construct()
    {
        parent::__construct();
    } 
    public function handle()
    {
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
        }
    }
}
