<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\lesson;
use Illuminate\Http\Request;
use App\Http\Resources\Lesson as LessonResource;
use Illuminate\Support\Facades\Response;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit') <=50 ? $request->input('limit') : 15;
        $lesson = LessonResource::collection(lesson::paginate($limit ?? 10));
        return  Response([
            'data' => [
                'message' => 'Lessons Return SuccessFully'
            ]
        ] , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lesson = new LessonResource(lesson::create($request->all()));
        return  Response([
            'data' => [
                'message' => 'create Lesson Success'
            ]
        ] , 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return lesson::find($id);
        $lesson =  new LessonResource(lesson::find($id));
        return  Response([
            'data' => [
                'message' => 'Lesson Return SuccessFully'
            ]
        ] , 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lesson_id = lesson::findOrFail($id) ;
        $this->authorize('update' ,  $lesson_id);
        $lesson =  new LessonResource( lesson::findOrFail($id)->update($request->all()));
        return  Response([
            'data' => [
                'message' => 'Update Lesson  SuccessFully'
            ]
        ] , 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lesson_id = lesson::findOrFail($id) ;
        $this->authorize('delete' ,  $lesson_id);
        $lesson = new LessonResource(lesson::find($id)->delete());
        return  Response([
            'data' => [
                'message' => 'Lesson Delete SuccessFully'
            ]
        ] , 200);
    }
}

