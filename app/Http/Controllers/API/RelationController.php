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
            $user = User::findOrFail($id);
            return  new JsonResponse([
                'data' => $user->lessons->toArray()
            ], 200);
    }

    public function user_tags($id) {
        $user = User::findOrFail($id);
        return $user->tags;
    }

    public function lesson_tags($id) {
        $lesson = lesson::findOrFail($id);
        return $lesson->tags;
    }

    public function tag_lessons($id) {
        $tag = tag::findOrFail($id);
        return $tag->lessons;
    }

}
