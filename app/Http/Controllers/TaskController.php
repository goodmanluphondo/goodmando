<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = new Task;
        $allTasks = array();
        $userId = Auth::user()->id;
        $sortedTasks = $tasks->get()->where('user_id', $userId)->where('completed', false)->sortByDesc('completed');
        return Inertia::render('Tasks', [
            'tasks' => $sortedTasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = new Category;
        return Inertia::render('New', [
            'categories' => $categories->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->user_id = Auth::user()->id;
        $task->category_id = $request->input('category');
        $task->description = $request->input('description');
        $task->start_date = $request->input('startDate');
        $task->start_time = $request->input('startTime');
        $task->duration = $request->input('duration');
        $task->save();

        // return Inertia::render('Tasks', [
        //     'alert' => 'Task added successfully.',
        //     'tasks' => Task::all()->where('user_id', Auth::user()->id)
        // ]);

        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($condition)
    {
        $tasks = new Task;
        $userId = Auth::user()->id;
        $userTasks = $tasks::all()->where('user_id', $userId);
        $viewTasks = array();
        $conditions = ['today', 'completed', 'upcoming'];
        if (in_array($condition, $conditions)) {
            switch ($condition) {
                case "today":
                    $viewTasks = $userTasks->where('start_date', date("Y-m-d"));
                    break;
                case "completed":
                    $viewTasks = $userTasks->where('completed', true);
                    break;
                case "upcoming":
                    $viewTasks = $userTasks->where('completed', false);
                    break;
            }
            return Inertia::render('Tasks', [
                'tasks' => $viewTasks
            ]);
        } else {
            return redirect("tasks");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $task = Task::find($id);
        $task->completed = $request->input('status');
        $task->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);

        return redirect()->back();
    }
}
