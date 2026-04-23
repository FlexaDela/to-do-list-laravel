<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubTaskRequest;
use App\Http\Requests\UpdateSubTaskRequest;
use App\Models\SubTask;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SubTaskController extends Controller
{

    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreSubTaskRequest $request)
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
    public function update(UpdateSubTaskRequest $request, SubTask $subTask)
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
