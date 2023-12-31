<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planta;
use App\Models\Controladora;
use App\Models\ControladoraPortas;

class PlantaController extends Controller
{
     // Listagem de planta
     public function index()
     {
         $plantas = Planta::all();
         return view('plantas.index', ['plantas' => $plantas]);
     }

     // Formulário de criação de planta
     public function create()
     {
        // Verificar se existe a necessidade de busca por status, aí tem que mudar a consulta
        $controladoras = Controladora::all();
        return view('plantas.create', ['controladoras' => $controladoras]);
     }

     // Armazenar uma nova planta
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'nome' => 'required|string|max:255',
             'data_plantacao' => 'required|date_format:Y-m-d',
             'percentual_umidade' => 'required|max:2',
             'status' => 'required|string|min:1|max:1',
             'porta_arduino_analogica' => 'required|string|min:1|max:2',
             'porta_arduino_digital' => 'required|string|min:1|max:2',
             'id_arduino' => 'required|string|min:1',
         ]);

         $planta = Planta::create($validatedData);

         $planta->controladoraPortaAnalogica->update([
            'status' => 1,
         ]);

         $planta->controladoraPortaDigital->update([
            'status' => 1,
         ]);

         return redirect('/plantas')->with('success', 'Planta cadastrada com sucesso.');
     }

     // Exibir um usuário específico
     public function show($id)
     {
        $planta = Planta::whereId($id)->first();
        return view('plantas.show', ['planta' => $planta]);
     }

     // Formulário de edição de usuário
     public function edit($id)
     {
         $planta = Planta::findOrFail($id);
         $controladoras = Controladora::all();
         return view('plantas.edit', ['planta' => $planta, 'controladoras' => $controladoras]);
     }

     // Atualizar um usuário
     public function update(Request $request, $id)
     {

         $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'data_plantacao' => 'required|date_format:Y-m-d',
            'percentual_umidade' => 'required|max:2',
            'status' => 'required|string|min:1|max:1',
            'porta_arduino_analogica' => 'required|string|min:1|max:2',
            'porta_arduino_digital' => 'required|string|min:1|max:2',
            'id_arduino' => 'required|string|min:1',
         ]);

         $planta = Planta::findOrFail($id);

         $planta->controladoraPortaAnalogica->update([
            'status' => 0,
         ]);

         $planta->controladoraPortaDigital->update([
            'status' => 0,
         ]);

         $planta->update($validatedData);

         $planta2 = Planta::findOrFail($planta->id);

         $planta2->controladoraPortaAnalogica->update([
            'status' => 1,
         ]);

         $planta2->controladoraPortaDigital->update([
            'status' => 1,
         ]);

         return redirect('/plantas')->with('success', 'Planta atualizada com sucesso.');
     }

     // Excluir um usuário
     public function destroy($id)
     {
         $planta = Planta::findOrFail($id);

         $planta->controladoraPortaAnalogica->update([
            'status' => 0,
         ]);

         $planta->controladoraPortaDigital->update([
            'status' => 0,
         ]);

         $planta->delete();

         return redirect('/plantas')->with('success', 'Planta excluída com sucesso.');
     }
}
