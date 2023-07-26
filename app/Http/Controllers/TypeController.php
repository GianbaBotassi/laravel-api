<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Type;

class TypeController extends Controller
{
    public function show($id)
    {
        $type = Type::findOrFail($id);

        return view('pages/type/type-show', compact('type'));
    }
}
