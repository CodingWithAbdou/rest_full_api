<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return lesson::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return lesson::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return lesson::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lesson = lesson::findOrFail($id);
        $lesson->update($request->all());

        return $lesson;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lesson = lesson::find($id);
        $lesson->delete();

        return 'success Delete';
    }
}

