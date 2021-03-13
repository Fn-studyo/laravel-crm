<?php

use App\Http\Resources\UpcomingResource;
use App\Models\Today;
use App\Models\Upcoming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


//Getting all tasks
Route::get('/upcoming', function(){
    $upcoming = Upcoming::all();

    return UpcomingResource::collection($upcoming);
});

//Adding a new task

Route::post('/upcoming', function(Request $request){
    return Upcoming::create([
        'title' => $request->title,
        'taskId' => $request->taskId,
        'waiting' => $request->waiting,
    ]);
});

//delete a task

Route::delete('/upcoming/{taskId}', function($taskId){
    DB::table('upcomings')->where('taskId', $taskId)->delete();

    return 204;
});

//Today's Task

Route::post('/dailytask', function(Request $request){
    return Today::create([
        'id' => $request->id,
        'title' => $request->title,
        'taskId' => $request->taskId
    ]);
});

//deleting today's task

Route::delete('/dailytask/{taskId}', function($taskId){
    DB::table('todays')->where('taskId', $taskId)->delete();

    return 204;
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
