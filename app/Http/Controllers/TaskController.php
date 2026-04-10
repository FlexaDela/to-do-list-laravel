<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = task::all();

       return view('tasks.index')->with('tasks', $tasks);
    }

    public function create(Request $request)
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
       DB::transaction(function() use($request){
            task::create($request->all());
       });

        return redirect()->route('tasks.index');
    }

    public function edit(task $task)
    {
        
     return view('tasks.edit')->with('tasks', $task);   
    }

    public function update(Request $request,task $task)
    {
        return redirect()->route('tasks.edit');
    }

    public function updateChecked(task $task)
    {
        $task->checked = !$task->checked;
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy(task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    } 
}
