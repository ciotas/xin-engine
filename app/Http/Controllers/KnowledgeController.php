<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    public function show($knowledge_id)
    {
        $knowledge = Knowledge::find($knowledge_id);
       
        return view('knowledge', ['knowledge' => $knowledge]);
    }
}
