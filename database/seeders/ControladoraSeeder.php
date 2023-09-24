<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Controladora;

class ControladoraSeeder extends Seeder
{
    public function run()
    {
        Controladora::create([
            'nome' => 'ARDUINO MEGA',
            'status' => 'A',
            'numero_portas' => 53,
            'ip' => '192.168.0.99',
        ]);
    }
}
