<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Planta;

class PlantasSeeder extends Seeder
{
    public function run()
    {
        Planta::create([
            'nome' => 'Rosa Vermelha',
            'percentual_umidade' => 60,
            'data_plantacao' => now(),
            'status' => 'A',
            'porta_arduino_analogica' => 4,
            'porta_arduino_digital' => 46,
            'id_arduino' => 1,
        ]);

        Planta::create([
            'nome' => 'Cacto Espinhoso',
            'percentual_umidade' => 20,
            'data_plantacao' => now(),
            'status' => 'A',
            'porta_arduino_analogica' => 5,
            'porta_arduino_digital' => 48,
            'id_arduino' => 1,
        ]);
    }
}
