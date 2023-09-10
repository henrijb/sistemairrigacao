<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
     // Listagem de usuários
     public function index()
     {
         $users = User::all();
         return view('users.index', ['users' => $users]);
     }
 
     // Formulário de criação de usuário
     public function create()
     {
         return view('users.create');
     }
 
     // Armazenar um novo usuário
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'name' => 'required|string|max:255',
             'login' => 'required|string|max:255',
             'email' => 'required|email|unique:users',
             'password' => 'required|string|min:6',
         ]);
 
         $user = User::create($validatedData);
 
         return redirect('/users')->with('success', 'Usuário criado com sucesso.');
     }
 
     // Exibir um usuário específico
     public function show($id)
     {
         $user = User::findOrFail($id);
         return view('users.show', ['user' => $user]);
     }
 
     // Formulário de edição de usuário
     public function edit($id)
     {
         $user = User::findOrFail($id);
         return view('users.edit', ['user' => $user]);
     }
 
     // Atualizar um usuário
     public function update(Request $request, $id)
     {
         $validatedData = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users,email,'.$id,
             'password' => 'string|min:6',
         ]);

         $user = User::findOrFail($id);        
         $user->update($validatedData);
 
         return redirect('/users')->with('success', 'Usuário atualizado com sucesso.');
     }
 
     // Excluir um usuário
     public function destroy($id)
     {
         $user = User::findOrFail($id);
         $user->delete();
 
         return redirect('/users')->with('success', 'Usuário excluído com sucesso.');
     }
}
