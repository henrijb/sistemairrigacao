<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ControladoraPortas;

class ControladoraPortasSeeder extends Seeder
{
    public function run()
    {
        for ($i=0; $i < 16; $i++) {
            ControladoraPortas::create([
                'controladora_id' => '1',
                'nome' => 'A' . $i,
                'tipo' => 'A',
                'status' => '0',
            ]);
        }

        for ($i=0; $i < 54; $i++) {
            ControladoraPortas::create([
                'controladora_id' => '1',
                'nome' => 'D' . $i,
                'tipo' => 'D',
                'status' => '0',
            ]);
        }
    }
}



