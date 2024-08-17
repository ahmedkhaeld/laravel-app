<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTasksRequest;
use App\Http\Requests\UpdateTasksRequest;
use App\Http\Resources\TasksResource;
use App\Models\Tasks;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        //return all tasks from the db
        return TasksResource::collection(Tasks::with('priority')->get());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTasksRequest $request): TasksResource
    {
        $task = Tasks::create($request->validated());
        $task->load('priority');
        return new TasksResource($task);

    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $task): TasksResource
    {
        //return single task
        return TasksResource::make($task);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTasksRequest $request, Tasks $task)
    {

        $task->update($request->validated());
        return TasksResource::make($task);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $task): \Illuminate\Http\Response
    {
        $task->delete();

        return response()->noContent();

    }
}
