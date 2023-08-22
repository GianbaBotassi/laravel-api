<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiProjectController extends Controller
{
    public function apiIndex()
    {
        $projects = Project::paginate(5);
        return response()->json([
            "projects" => $projects
        ]);
    }
    public function apiShow($id)
    {
        $project = Project::findOrFail($id);

        return response()->json([
            "project" => $project
        ]);
    }
}
