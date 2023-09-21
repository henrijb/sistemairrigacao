<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class LuzDesligar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'luz:desligar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Desliga a luz';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ipaddress = "192.168.0.99";
        $arduinoResponse = Http::get("http://{$ipaddress}/off");

        if ($arduinoResponse->successful()) {
            $arduinoData = json_decode($arduinoResponse->body(), true);

            if ($arduinoData && isset($arduinoData['status'])) {
                $this->info('Remote command executed successfully.');
                $this->info('Arduino Response: ' . $arduinoData['led']);
            } else {
                $this->error('Invalid JSON response from Arduino.');
            }
        } else {
            $this->error('Failed to execute remote command.');
        }

        //dump($response->status());
        //dump($response->body());

        //dd($response);
    }
}
