<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Controladora;

class ControladoraController extends Controller
{
     // Listagem das controladoras
     public function index()
     {
         $controladoras = Controladora::all();
         return view('controladoras.index', ['controladoras' => $controladoras]);
     }
 
     // Formulário de criação da controladora
     public function create()
     {
         return view('controladoras.create');
     }
 
     // Armazenar uma nova controladora
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'nome' => 'required|string|max:255',
             'status' => 'required|string|min:1|max:1',
             'numero_portas' => 'required|string|min:1|max:2',
         ]);

         $controladora = Controladora::create($validatedData);
 
         return redirect('/controladoras')->with('success', 'Controladora cadastrada com sucesso.');
     }
 
     // Exibir uma controladora específica
     public function show($id)
     {
         $controladora = Controladora::findOrFail($id);
         return view('controladoras.show', ['controladora' => $controladora]);
     }
 
     // Formulário de edição da controladora
     public function edit($id)
     {
         $controladora = Controladora::findOrFail($id);
         return view('controladoras.edit', ['controladora' => $controladora]);
     }
 
     // Atualizar uma controladora
     public function update(Request $request, $id)
     {

         $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'status' => 'required|string|min:1|max:1',
            'numero_portas' => 'required|string|min:1|max:2',
         ]);
 
         $controladora = Controladora::findOrFail($id);
         $controladora->update($validatedData);
 
         return redirect('/controladoras')->with('success', 'Controladora atualizada com sucesso.');
     }
 
     // Excluir uma controladora
     public function destroy($id)
     {
         $controladora = Controladora::findOrFail($id);
         $controladora->delete();
 
         return redirect('/controladoras')->with('success', 'Controladora excluída com sucesso.');
     }
}
