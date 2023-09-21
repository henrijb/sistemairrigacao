<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GenericCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'luzinha:ligar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manda um comando para o arduino para realizar a irrigação';

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

        /*for ($i = 0; $i <= 30; $i++) {
            $response = Http::get(env('URL_ARDUINO') . '/on');

            dump($response->status());
            dump($response->body());

            sleep(1);
        }
    */
        $response = Http::get(env('URL_ARDUINO') . '/on');

        dump($response->status());
        dump($response->body());

        //dd($response);
    }
}
