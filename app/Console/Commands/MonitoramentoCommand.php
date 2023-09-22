<?php

namespace App\Console\Commands;

use App\Models\Planta;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Psy\Readline\Hoa\Console;

class MonitoramentoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'irrigacao:monitorar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monitora a umidade de todas as plantas do sistema e inicia a rega, se necessário';

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

        $plantas = Planta::all();

        foreach ($plantas as $planta) {
            // colocar aqui o Http:post(env('URL_ARDUINO') . '/umidade', [])

            // Simulação do retorno do banco e do arduino
            $this->alert($planta->nome);
            $umidadeMinima = $this->ask('Qual é a umidade mínima');
            //$umidadeMaxima = $this->ask('Qual é a umidade máxima');

            $umidadeSolo = rand(1, 100); // Simulando a umidade da planta no momento

            $porta = $planta->porta_arduino;
            $this->info('Escutando a porta ' . $porta . ' do arduino');
            $this->info('');
            $this->comment('Umidade atual do solo da planta: ' . $umidadeSolo);
            $this->info('');

            while ($umidadeSolo <= $umidadeMinima) {
                $this->info('Realizando a rega...');
                $umidadeSolo += 2; // Simulando a umidade do solo com a rega
                $this->info('Umidade atual do solo: ' . $umidadeSolo);
                sleep(2);
            }

            $this->info('');
            $this->comment('Rega finalizada!');
            $this->info('');

            $dataDaRega = Carbon::now();

            if ($planta->update(['ultima_rega' => $dataDaRega])) {
                $this->info('Dados atualizados com sucesso!');
            }

            // Final da simulação
        }
    }
}
