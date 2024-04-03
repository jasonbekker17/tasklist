<?php
use App\Models\Task;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





Route::get('/',function(){
  
return redirect()->route('tasks.index');
});


Route::get('/tasks', function () {
    return view('index' ,[
        'tasks' => Task::latest()->get()
       ]);
})->name('tasks.index');


Route::view('/tasks/create','create')
->name('tasks.create');


Route::get('task/{id}' ,function($id) {
     return view('show',[
      'task'=> Task::findorFail($id)
    ]);
})->name('tasks.show');


Route::post('/tasks', function(Request $request){

$data=$request->validate([
  'title'=>'required|max:255',
  'description'=>'required',
  'long_description'=>'required',
]);

//creating a new task model
$task= new Task;

//inserting the properties of the task

$task->title=$data['title'];
$task->description=$data['description'];
$task->long_description=$data['long_description'];

$task->save();

return redirect()->route('tasks.show',['id'=> $task->id]);



})->name('tasks.store');








// Route::get('/hello', function () {

//         return 'hello world';
// });

// Route::get('/greet/{name}', function ($name) {

//     return 'hello '.$name;
// });
