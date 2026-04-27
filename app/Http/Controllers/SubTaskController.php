<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubTaskRequest;
use App\Models\SubTask;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Request;

class SubTaskController extends Controller
{

    use AuthorizesRequests;

    /**
     * Show the form for creating a new resource.
     */
    public function create(SubTaskRequest $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubTaskRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(SubTask $subTask)
    {
        $this->authorize('view', $subTask);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubTask $subTask)
    {
        $this->authorize('update',$subTask);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubTaskRequest $request, SubTask $subTask)
    {
        $this->authorize('update',$subTask);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubTask $subTask)
    {
        $this->authorize('delete',$subTask);
    }
}
