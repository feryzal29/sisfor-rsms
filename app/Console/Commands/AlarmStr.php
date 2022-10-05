<?php

namespace App\Console\Commands;

use App\Models\employee;
use App\Models\Str;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AlarmStr extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:alarmstr';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Alarm STR';

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
        $str = Str::with([
            'employee'
        ])->get();

        return 0;
    }
}