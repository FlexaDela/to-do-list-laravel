<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use Illuminate\Console\View\Components\Task as ComponentsTask;

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
        task::create($request->all());

        return redirect()->route('tasks.index');
    }

    public function edit(Request $request)
    {

    }

    public function update(Request $request)
    {

    }

    public function updateChecked(task $tasks)
    {
        $tasks->checked = !$tasks->checked;
        $tasks->save();

        return redirect()->route('tasks.index');
    }

    public function destroy(Request $request)
    {

    } 
}
