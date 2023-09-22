<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planta;
use App\Models\Controladora;

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
             'hora_rega' => 'required|string|max:255',
             'ultima_rega' => 'nullable|date_format:d/m/Y H:i',
             'status' => 'required|string|min:1|max:1',
             'porta_arduino' => 'required|string|min:1|max:2',
             'id_arduino' => 'required|string|min:1',
         ]);

         $planta = Planta::create($validatedData);

         return redirect('/plantas')->with('success', 'Planta cadastrada com sucesso.');
     }

     // Exibir um usuário específico
     public function show($id)
     {
         $planta = Planta::findOrFail($id);
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
            'hora_rega' => 'required|string|max:255',
            'ultima_rega' => 'nullable|date_format:d/m/Y H:i',
            'status' => 'required|string|min:1|max:1',
            'porta_arduino' => 'required|string|min:1|max:2',
            'id_arduino' => 'required|string|min:1',
         ]);



         //$validatedData['data_plantacao'] = \Carbon\Carbon::createFromFormat('d/m/Y', $validatedData['data_plantacao']);
         //$validatedData['ultima_rega'] = \Carbon\Carbon::createFromFormat('d/m/Y', $validatedData['ultima_rega']);

//         $validatedData['data_plantacao'] = $validatedData['data_plantacao']->format('Y-m-d H:i:s');
//         $validatedData['ultima_rega'] =  $validatedData['ultima_rega']->format('Y-m-d H:i:s');


         $planta = Planta::findOrFail($id);
         $planta->update($validatedData);

         return redirect('/plantas')->with('success', 'Planta atualizada com sucesso.');
     }

     // Excluir um usuário
     public function destroy($id)
     {
         $planta = Planta::findOrFail($id);
         $planta->delete();

         return redirect('/plantas')->with('success', 'Planta excluída com sucesso.');
     }
}
