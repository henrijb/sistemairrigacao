<?php

namespace App\Console\Commands;

use App\Models\Controladora;
use App\Models\Planta;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\Log;

class MonitoramentoCommand extends Command
{
    const STATUS_ATIVO  = 'A';
    const STATUS_INATIVO = 'B';
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

        Log::alert("Iniciando Rega");

        $plantas = Planta::all()
            ->where('status', self::STATUS_ATIVO);

        foreach ($plantas as $planta) {
            $this->alert($planta->nome);

            $controladora = Controladora::where('id', $planta->id_arduino)->first();

            $this->info('Realizando a consulta na controladora');

            $percentualUmidade = $this->monitorarUmidade($planta, $controladora);

            if ($percentualUmidade === false) {
                $this->alert('Não foi possivel realizar a rega na planta ' . $planta->nome);
                continue;
            }

            $this->comment('Identificando a umidade do solo...');
            $this->info('Umidade atual do solo: ' . $percentualUmidade);

            while ($percentualUmidade <= $planta->percentual_umidade) {
                $this->info('Realizando a rega...');

                $this->regar($planta, true);
                sleep(2);
                $this->regar($planta, false);
                sleep(8);
                $percentualUmidade = $this->monitorarUmidade($planta, $controladora);
                $this->info('Umidade atual do solo: ' . $percentualUmidade);
            }

            $this->info('');
            $this->comment('Rega finalizada!');
            $this->info('');

            $dataDaRega = Carbon::now();

            if ($planta->update(['ultima_rega' => $dataDaRega])) {
                $this->info('Dados atualizados com sucesso!');
            }
        }
        Log::alert("Finalizando Rega");
    }

    private function monitorarUmidade(Planta $planta, Controladora $controladora)
    {
        $response = Http::post($controladora->ip . '/umidade', [
            'porta' => $planta->controladoraPortaAnalogica->nome
        ]);

        if ($response->successful()) {
            $data = json_decode($response->body(), true);
            Log::alert("Sensor " . $planta->controladoraPortaAnalogica->nome);
            Log::alert("Umidade do solo " . $data['umidade']);
            return $data['umidade'];
        };

        return false;
    }

    private function regar(Planta $planta, $shutdown = false)
    {
        $response = Http::post($planta->controladora->ip . '/irrigacao', [
            'power' => $shutdown,
            'portaMotor' => env('PORTA_MOTOR'),
            'portaSolenoide' => $planta->controladoraPortaDigital->nome,
        ]);

        Log::alert("Motor " . env('PORTA_MOTOR'));
        Log::alert("Solenoide " . $planta->controladoraPortaDigital->nome);
        Log::alert("Estado " . $shutdown);

        if ($response->successful()) {
            $data = json_decode($response->body(), true);

            Log::alert("Irrigacao " . $data['irrigacao_status']);

            return $data['irrigacao_status'];
        }

        return false;
    }
}
