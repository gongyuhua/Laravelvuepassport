<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Repository\Interfaces\TaskInterface;

class TaskController extends Controller
{
    protected $task;
    public function __construct(TaskInterface $task)
    {
        $this->task = $task;
    }
    public function index()
    {
        return $this->task->all();
    }

    public function store(Request $request)
    {
        $task=$this->task->create($request->all());


        return response()->json([
            'status' => (bool) $task,
            'data'   => $task,
            'message' => $task ? 'Task Created!' : 'Error Creating Task'
        ]);
    }

    public function show(Task $task)
    {
        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $this->task->update($request->only($this->task->getTask()->fillable), $id);
        return $this->task->find($id);
    }
    public function destroy($id)
    {
        return $this->task->delete($id);
    }
}