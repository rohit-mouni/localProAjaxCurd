<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

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
        User::create([
            'username' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => 6377716151,
            'password' => '12345678',
            'status'   => 0,
            'device_token' => 'dOR_ZY8tTw-j6c8Qf6LDZ8',
        ]);
    }
}
