<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\Permohonan;
use Illuminate\Console\Command;

class PassingVerifikator1ToVerifikator2Jobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:passing-verifikator1-to-verifikator2-jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $oneDayAgo = Carbon::now()->subDay();

        Permohonan::where('status_permohonan_id', 5)
                  ->where('updated_at', '<', $oneDayAgo)
                  ->update(['status_permohonan_id' => 6]);

        Permohonan::where('status_permohonan_id', 9)
                  ->where('updated_at', '<', $oneDayAgo)
                  ->update(['status_permohonan_id' => 10]);


    }
}
