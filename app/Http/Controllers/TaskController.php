<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskEditRequest;
use App\Http\Requests\TaskPostRequest;
use Illuminate\Http\Request;
use App\Models\task;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {

        $tasks = Auth::user()->tasks()->get();
        $messageSuccess = $request->session()->get('success.menssage');

       return view('tasks.index')->with('tasks', $tasks)->with('messageSuccess', $messageSuccess);
    }

    public function create(Request $request)
    {
        return view('tasks.create');
    }

    public function store(TaskPostRequest $request)
    {
        $data = $request->validated();

        $task = Auth::user()->tasks()->create($data);

        $request->session()->flash('success.menssage', "Tarefa: '{$task->name}' criada com sucesso");

        return to_route('tasks.index');
    }

    public function edit(task $task, Request $request)
    {
        $this->authorize('update',$task);
        $successMensage = $request->session()->get('success.menssage');

        return view('tasks.edit')->with('tasks', $task)->with('successMensage',$successMensage);
    }

    public function update(TaskEditRequest $request,task $task)
    {
        $this->authorize('update',$task);
        $task->update($request->validated());

        $request->session()->flash('success.menssage', 'Tarefa atualizada com sucesso');

        return to_route('tasks.edit', $task->id);
    }

    public function show(task $task, Request $request)
    {
        $this->authorize('view', $task);

        $messageSuccess = $request->session()->get('menssage.success');

        $subTasks = $task->subTask()->get();

        return view('tasks.show')->with('task', $task)->with('subTasks', $subTasks)->with('messageSuccess',$messageSuccess);
    }

    public function updateChecked(task $task, Request $request)
    {
        $this->authorize('updateChecked', $task);

        DB::transaction(function() use($task){
            $task->status = !$task->status;
            $task->save();
        });

        return redirect()->back();
    }

    public function destroy(Request $request, task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        $request->session()->flash('success.menssage',"Tarefa: '{$task->name}' deletada com sucesso");

        return to_route('tasks.index');
    }
}
