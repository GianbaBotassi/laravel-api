<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Type;

class TypeController extends Controller
{
    public function showall()
    {

        $types = Type::all();

        return view('pages/type/type-showall', compact('types'));
    }

    public function create()
    {

        return view('pages/type/type-create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $type = Type::create($data);

        return redirect()->route('type-show', $type->id);
    }


    public function show($id)
    {
        $type = Type::findOrFail($id);

        return view('pages/type/type-show', compact('type'));
    }

    public function edit($id)
    {

        $type = Type::findOrFail($id);

        return view('pages/type/type-edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $data = $request
            ->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

        $type = type::findOrFail($id);

        $type->update($data);

        return redirect()->route('type-show', $type->id);
    }

    public function destroy($id)
    {
        $type = Type::findOrFail($id);

        $type->delete();

        return redirect()->route('index');
    }
}
