<?php

namespace App\Admin\Controllers;

use App\Models\Cube;
use App\Models\Link;
use App\Models\Module;
use App\Models\Tab;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApiController extends AdminController
{
    public function modules(Request $request)
    {
        $q = $request->get('q');

        return Module::where('name', 'like', "%$q%")->get(['id', DB::raw('name as text')]);
    }

    public function cubes(Request $request)
    {
        $q = $request->get('q');

        return Cube::where('module_id', $q)->get(['id', DB::raw('name as text')]);
    }

    public function links(Request $request)
    {
        $q = $request->get('q');

        return Link::where('cube_id', $q)->get(['id', DB::raw('alias as text')]);
    }

    public function tabs(Request $request)
    {
        $q = $request->get('q');

        return Tab::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);

        // return Tab::where('name', 'like', "%$q%")->get(['id', DB::raw('name as text')]);
    }
}
