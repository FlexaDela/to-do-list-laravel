<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubTaskRequest;
use App\Models\SubTask;
use App\Models\task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Request;


class SubTaskController extends Controller
{

    use AuthorizesRequests;

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subTask.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubTaskRequest $request, task $task)
    {
        $data = $request->validated();
        $data['task_id'] = $task->id;

        $subtask = SubTask::create($data);

        $request->session()->flash('menssage.success',"Sub-tarefa:'$subtask->name' criada com sucesso");

        return to_route('tasks.show', $task->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubTask $subTask)
    {
        $this->authorize('update',$subTask);

        return view('subTask.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubTaskRequest $request, SubTask $subTask, task $task)
    {
        $this->authorize('update',$subTask);
        $data = $request->validated();

        $subTask->update($data);

        $request->session()->flash('menssage.success',"SubTarefa atualizada com sucesso");

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubTask $subTask, Request $request)
    {
        $this->authorize('delete',$subTask);

        $subTask->delete();

        $request->session()->flash('menssage.success',"SubTarefa deletada com sucesso");

        return redirect()->back();
    }
}
