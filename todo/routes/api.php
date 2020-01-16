    <?php

use Illuminate\Http\Request;

Route::get("tasks", "TasksController@index");
Route::get("tasks/{task}", "TasksController@show");
Route::patch("tasks/{task}", "TasksController@update");
Route::delete("tasks/{task}", "TasksController@destroy");
Route::post("tasks", "TasksController@store");
