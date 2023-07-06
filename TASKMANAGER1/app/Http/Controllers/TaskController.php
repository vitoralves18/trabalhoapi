<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
        /*
        return Task::all();
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Titulo' => 'required',
            'Descricao' => 'required',
            'Status' => 'required',
        ]);
        return Task::create($request ->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Task::findOrfail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Titulo' => 'required',
            'Descricao' => 'required',
            'Status' => 'required',
        ]);
        $task = Task::findOrfail($id);
        $task->update($request->all());
        return response()->json(['Tarefa atualizada'], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrfail($id);
        $task->delete();
        return response()->json(['Tarefa excluida'], 200);
    }
}
