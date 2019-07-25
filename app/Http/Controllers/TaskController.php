<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;
use App\Task;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{

    protected $tasks;
    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;

    }

    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }


    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(StoreTask $request)
    {
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks')->with('status', 'Task created!');
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy($task)
    {
        $task = Task::findOrFail($task);
        if($task) {
            $task->delete();
            return redirect('/tasks')->with('status', trans('Task deleted'));
        }

        return redirect('/tasks')->withErrors([trans('Can\'t find task')]);
    }

}
