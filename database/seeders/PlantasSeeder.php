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
            'porta_arduino' => 4,
            'id_arduino' => 1,
        ]);

        Planta::create([
            'nome' => 'Cacto Espinhoso',
            'percentual_umidade' => 20,
            'data_plantacao' => now(),
            'status' => 'A',
            'porta_arduino' => 5,
            'id_arduino' => 1,
        ]);
    }
}
