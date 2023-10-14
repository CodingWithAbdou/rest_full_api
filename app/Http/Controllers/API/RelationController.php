<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\lesson;
use App\Models\tag;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RelationController extends Controller
{
    public function user_lessons($id) {


            $user = User::findOrFail($id)->lessons;

            $fields = [];
            $filterd = [] ;
            foreach ($user as $lesson) {
                $fields['Title'] = $lesson->title;
                $fields['Content'] = $lesson->body;

                $filterd[] = $fields;
            }

            return response()->json(
                [
                    'data' => $filterd
                ]
                , 200);


        }

    public function user_tags($id) {

        $user = User::findOrFail($id)->tags;

        $fields = [];
        $filterd = [] ;
        foreach ($user as $tag) {
            $fields['Name'] = $tag->name;

            $filterd[] = $fields;
        }

        return response()->json(
            [
                'data' => $filterd
            ]
            , 200);

    }

    public function lesson_tags($id) {
        $lesson = lesson::findOrFail($id)->tags;

        $fields = [];
        $filterd = [] ;
        foreach ($lesson as $tag) {
            $fields['Name'] = $tag->name;

            $filterd[] = $fields;
        }

        return response()->json(
            [
                'data' => $filterd
            ]
            , 200);
    }

    public function tag_lessons($id) {
        $tag = tag::findOrFail($id)->lessons;

        $fields = [];
        $filterd = [] ;
        foreach ($tag as $lesson) {
            $fields['Title'] = $lesson->title;
            $fields['Content'] = $lesson->body;

            $filterd[] = $fields;
        }

        return response()->json(
            [
                'data' => $filterd
            ]
            , 200);
    }

}
