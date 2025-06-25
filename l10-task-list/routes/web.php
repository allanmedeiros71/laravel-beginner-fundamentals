<?php

use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index',[
        'tasks'=>Task::latest()->paginate(10),
    ]);
})->name('tasks.index');

Route::view('/tasks/create','create')
    ->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task'=>$task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
  return view('show', ['task'=>$task]);
})->name('tasks.show');

Route::post('/tasks', function(TaskRequest $request){
    // $task = new Task();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();

    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task created Successfully');
})->name('tasks.store');

Route::put('/tasks/{task}', function(TaskRequest $request, Task $task){
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();

    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task])->with('success', 'Task updated Successfully');
})->name('tasks.update');

Route::delete('/tasks/{task}', function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task deleted Successfully');
})->name('tasks.destroy');

Route::patch('/tasks/{task}/toggle-completed', function(Task $task){
    $task->toggleComplete();
    return redirect()->back()->with('success', 'Task toggled Successfully');
})->name('tasks.toggle-completed');

// Route::get('/hello', function () {
//     return 'Hello';
// })->name('hello');

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
//     return "Hello $name!";
// });

Route::fallback(function () {
    return 'Still got somewhere!';
});