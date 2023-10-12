<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\lesson;
use App\Models\tag;
use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function user_lessons($id) {
        $user = User::find($id);
        return $user->lessons;
    }

    public function user_tags($id) {
        $user = User::find($id);
        return $user->tags;
    }

    public function lesson_tags($id) {
        $lesson = lesson::find($id);
        return $lesson->tags;
    }

    public function tag_lessons($id) {
        $tag = tag::find($id);
        return $tag->lessons;
    }

}
