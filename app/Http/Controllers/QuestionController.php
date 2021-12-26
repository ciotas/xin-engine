<?php

namespace App\Http\Controllers;

use App\Admin\Repositories\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function postQuestion(Request $request)
    {
        $title = $request->title;
        $tags = $request->tags; // 逗号分隔
        Question::create([
            'title' => $title,
            'tags' => $tags
        ]);
        return response()->json([
            'code' => 200,
            'msg' => 'success',
            'data' => null
        ]);

    }
}
