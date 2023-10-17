<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\RelationController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1/' ] , function () {


    // fetch Users
    Route::apiResource('users' , UserController::class);
    // fetch Lessons
    Route::apiResource('lessons' , LessonController::class);
    // fetch tags
    Route::apiResource('tags' , TagController::class);
    /// relation bettwin table
    Route::get(' user/{id}/lessons' ,[ RelationController::class , 'user_lessons']);
    Route::get('user/{id}/tags' ,[ RelationController::class , 'user_tags']);
    Route::get('lesson/{id}/tags' ,[ RelationController::class , 'lesson_tags']);
    Route::get('tag/{id}/lessons' ,[ RelationController::class , 'tag_lessons']);

    // login

    Route::get('/login' , [LoginController::class  , 'login'])->name('login');


    // Check When Write Wrong
    Route::any('lesson' , function () {
        $message = 'pleas write lessons';

        return Response::json($message , 404);
    });

    // Route::redirect('tag' , 'tags');
});

// Route::domain('{account}.myapp.com')->group(function(){
//     Route::get('user/{id}' , function($id) {
//         //
//     });
// });

// Route::get('lessons/{lesson:slug}' , function ($lesson) {
//     return $lesson;
// });


// Route::fallback(function() {
//     //
// });
