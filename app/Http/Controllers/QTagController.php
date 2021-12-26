<?php

namespace App\Http\Controllers;

use App\Models\QTag;
use Illuminate\Http\Request;

class QTagController extends Controller
{
    public function index()
    {
        $tags = QTag::all();
        return response()->json([
            'code'=> 200,
            'msg'=>'success',
            'data' => $tags
        ]);
    }
}
