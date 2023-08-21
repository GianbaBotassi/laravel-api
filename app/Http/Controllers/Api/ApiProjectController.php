<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiProjectController extends Controller
{
    public function apiIndex()
    {
        $projects = Project::all();
        return response()->json([
            "data" => $projects
        ]);
    }
}
