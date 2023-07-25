<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Type;

class MainController extends Controller
{
    public function index()
    {

        $projects = Project::all();

        return view('public.index', compact('projects'));
    }
    public function edit($id)
    {
        $types = Type::all();
        $project = Project::findOrFail($id);

        return view('profile.edit', compact('project', 'types'));
    }
}
