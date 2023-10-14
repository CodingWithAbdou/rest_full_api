<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\lesson;
use Illuminate\Http\Request;
use App\Http\Resources\Lesson as LessonResource;
class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lesson = LessonResource::collection(lesson::all());
        return $lesson->response()->setStatusCode(200 , "Lessons Return SuccessFully");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lesson = new LessonResource(lesson::create($request->all()));
        return $lesson->response()->setStatusCode(200 , "create Lesson Success");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return lesson::find($id);
        $lesson =  new LessonResource(lesson::find($id));
        return $lesson->response()->setStatusCode(200 , "Lesson Return SuccessFully");

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lesson =  new LessonResource( lesson::findOrFail($id)->update($request->all()));
        return $lesson->response()->setStatusCode(200 , "Update Lesson  SuccessFully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lesson = new LessonResource(lesson::find($id)->delete());
        return $lesson->response()->setStatusCode(200 , "Lesson Delete SuccessFully");
    }
}

