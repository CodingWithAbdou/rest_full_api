<?php

use App\Models\lesson;
use App\Models\tag;
use App\Models\User;
use Illuminate\Http\Request;
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

Route::group(['prefix' => 'v1/'] , function () {

    // Users
    Route::get('users' , function() {
        return User::all();
    });

    Route::get('users/{id}' , function($id) {
        return User::find($id);
    });

    Route::post('users' , function(Request $request) {
        return User::create($request->all());
    });

    Route::put('users/{id}' , function(Request $request , $id) {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return $user;
    });

    Route::delete('users/{id}' , function($id) {
        $user = User::find($id);
        $user->delete();
    });

    //////////////////////// Lessons
    Route::get('lessons' , function() {
        return lesson::all();
    });

    Route::get('lessons/{id}' , function($id) {
        return lesson::find($id);
    });

    Route::post('lessons' , function(Request $request) {
        return lesson::create($request->all());
    });

    Route::put('lessons/{id}' , function(Request $request , $id) {
        $lesson = lesson::findOrFail($id);
        $lesson->update($request->all());

        return $lesson;
    });

    Route::delete('lessons/{id}' , function($id) {
        $lesson = lesson::find($id);
        $lesson->delete();
    });

    /////////////////// tags

    Route::get('tags' , function() {
        return tag::all();
    });

    Route::get('tags/{id}' , function($id) {
        return tag::find($id);
    });

    Route::post('tags' , function(Request $request) {
        return tag::create($request->all());
    });

    Route::put('tags/{id}' , function(Request $request , $id) {
        $tag = tag::findOrFail($id);
        $tag->update($request->all());

        return $tag;
    });

    Route::delete('tags/{id}' , function($id) {
        $tag = tag::find($id);
        $tag->delete();
    });

    Route::any('tag' , function () {
        return 'error : pleas write tags';
    });

    /// relation bettwin table

    Route::get('user/{id}/lessons' , function ($id) {
        $user = User::find($id);
        return $user->lessons;
    });

    Route::get('user/{id}/tags' , function ($id) {
        $user = User::find($id);
        return $user->tags;
    });

    Route::get('lesson/{id}/tags' , function ($id) {
        $lesson = lesson::find($id);
        return $lesson->tags;
    });

    Route::get('tag/{id}/lessons' , function ($id) {
        $tag = tag::find($id);
        return $tag->lessons;
    });
    // Route::redirect('tag' , 'tags');
});

Route::domain('{account}.myapp.com')->group(function(){
    Route::get('user/{id}' , function($id) {
        //
    });
});

Route::get('lessons/{lesson:slug}' , function ($lesson) {
    return $lesson;
});


Route::fallback(function() {
    //
});
