<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::orderby('created_at','DESC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTask = new Task;
        $newTask->title = $request->task["title"];
        $newTask->description = $request->task["description"];
        $newTask->status = false;

        $newTask->save();

        return $newTask;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task_to_update = Task::find($id);

        if($task_to_update)
        {
            $task_to_update->description = $request->task['description'];
            $task_to_update->status = $request->task['status'] ? true : false;
            $task_to_update->save();
            return $task_to_update;
        }

        return "Task not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task_to_update = Task::find($id);

        if($task_to_update)
        {
            $task_to_update->delete();
            return "Task successfully deleted";
        }

        return "Task not found";
    }
}
