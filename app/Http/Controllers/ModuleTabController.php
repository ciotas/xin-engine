<?php

namespace App\Http\Controllers;

use App\Models\ModuleTab;
use Illuminate\Http\Request;

class ModuleTabController extends Controller
{
    public function index()
    {
        $tabs = ModuleTab::all();
        return response()->json([
            'code' => 200,
            'msg'=> 'success',
            'data' => $tabs
        ]);
    }
}
