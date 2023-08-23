<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

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
        $project = Project::with('type', 'technologies')->findOrFail($id);

        return response()->json([
            "project" => $project
        ]);
    }
    public function getTypes()
    {
        $types = Type::all();

        return response()->json([
            "types" => $types
        ]);
    }
    public function getTechnologies()
    {
        $technologies = Technology::all();

        return response()->json([
            "technologies" => $technologies
        ]);
    }
    public function storeProject(Request $request)
    {
        $data = $request->all();

        $project = Project::create($data);

        return response()->json([
            "id" => $project->id
        ]);
    }
}
