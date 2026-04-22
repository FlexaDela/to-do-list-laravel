<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskPostRequest;
use Illuminate\Http\Request;
use App\Models\task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {

        $tasks = Auth::user()->tasks()->get();

       return view('tasks.index')->with('tasks', $tasks);
    }

    public function create(Request $request)
    {
        return view('tasks.create');
    }

    public function store(TaskPostRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function() use($data){
            Auth::user()->tasks()->create($data);
        });

        return redirect()->route('tasks.index');
    }

    public function edit(task $task)
    {

     return view('tasks.edit')->with('tasks', $task);
    }

    public function update(Request $request,task $task)
    {
        $task->update($request->all());

        return redirect()->route('tasks.edit', $task->id);
    }

    public function show(task $task)
    {
        return view('tasks.show')->with('task', $task);
    }

    public function updateChecked(task $task)
    {
        DB::transaction(function() use($task){
            $task->status = !$task->status;
            $task->save();
        });

        return redirect()->back();
    }

    public function destroy(task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
