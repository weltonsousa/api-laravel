<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {

        // $tasks = [
        //     [
        //         "id" => 1,
        //         "name" => "Estudar PHP",
        //         "complete" => false
        //     ],
        //     [
        //         "id" => 2,
        //         "name" => "Estudar Java Script",
        //         "complete" => true
        //     ],
        //     [
        //         "id"=>3,
        //         "name"=>"Estudar Laravel",
        //         "complete"=> true
        //     ]
        // ];

        $tasks = Clientes::all();
        return $tasks;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'sobrenome'=>'required'
        ]);

        $task = Clientes::create([
            'nome' => $request->input('nome'),
            'sobrenome' => $request->input('sobrenome')
        ]);

        return $task;
    }

    public function show(Clientes $task)
    {

        return $task;
    }

    //Metódo Update passando dois paramentros de duas classes (o da requisição e o modelo).
    public function update(Request $request, Clientes $task)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'sobrenome' => 'required'
        ]);

        //A variável $task vai atualizar a coluna nome com os dados vindo da requisição.
        $task->nome = $request->input('nome');
        $task->save();
        return $task;
    }

    public function destroy(Clientes $task)
    {

        $task->delete();

        return response()->json(['success' => true]);
    }
}
