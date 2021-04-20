<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Tasks1Controller extends Controller
{
  /**
   * Show the profile for a given user.
   *
   * @param  int  $id
   * @return \Illuminate\View\View
   */
  public function addTask()
  {
    return Inertia::render('Cashier');
  }

  public function viewTasks($condition)
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
      return redirect("/tasks");
    }
  }
}
