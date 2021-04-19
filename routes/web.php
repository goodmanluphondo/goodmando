<?php

use App\Models\Task;
use App\Models\Category;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     $tasks = new Task;
//     return Inertia::render('Dashboard', [
//         'tasks' => $tasks->all()
//     ]);
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tasks', function () {
    $tasks = new Task;
    return Inertia::render('Tasks', [
        'tasks' => $tasks->all()
    ]);
})->middleware(['auth', 'verified'])->name('tasks');

Route::get('/tasks/{condition}', function ($condition) {
    $tasks = new Task;
    $show_tasks = array();
    $conditions = ['today', 'completed', 'upcoming'];
    if (in_array($condition, $conditions)) {
        switch ($condition) {
            case "today":
                $show_tasks = $tasks::all()->where('start_date', now());
                break;
            case "completed":
                $show_tasks = $tasks::all()->where('completed', true);
                break;
            case "upcoming":
                $show_tasks = $tasks::all()->where('completed', false);
                break;
        }
        return Inertia::render('Dashboard', [
            'tasks' => $show_tasks
        ]);
    } else {
        return redirect("/tasks");
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/add-task', function () {
    $categories = new Category;
    return Inertia::render('New', [
        'categories' => $categories->all()
    ]);
})->middleware(['auth', 'verified'])->name('add-task');

// Route::get('/inbox', function () {
//     $tasks = new Task;
//     return Inertia::render('Inbox', [
//         'tasks' => $tasks->all()
//     ]);
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
