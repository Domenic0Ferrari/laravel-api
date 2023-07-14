<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    private $validations = [
        'name' => 'required|string|min:5|max:30',
        'description' => 'required|string|min:5|max:200',
    ];

    private $validation_messages = [
        // name
        'name.required' => 'Il campo name è obbligatorio',
        'name.min' => 'Il campo name deve avere almeno :min caratteri',
        'name.max' => 'Il campo name deve avere almeno :max caratteri',
        // description
        'description.required' => 'Il campo description è obbligatorio',
        'description.min' => 'Il campo description deve avere almeno :min caratteri',
        'description.max' => 'Il campo description deve avere almeno :max caratteri',
    ];

    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->validations, $this->validation_messages);

        $data = $request->all();

        $newType = new Type();
        $newType->name = $data['name'];
        $newType->description = $data['description'];
        $newType->slug = Type::slugger($data['name']);

        $newType->save();

        return to_route('admin.types.show', ['type' => $newType]);
    }

    public function show($slug)
    {
        $type = Type::where('slug', $slug)->firstOrFail();
        return view('admin.types.show', compact('type'));
    }

    public function edit($slug)
    {
        $type = Type::where('slug', $slug)->firstOrFail();
        return view('admin.types.edit', compact('type'));
    }

    public function update(Request $request, $slug)
    {
        $type = Type::where('slug', $slug)->firstOrFail();
        $request->validate($this->validations, $this->validation_messages);

        $data = $request->all();

        $type->name = $data['name'];
        $type->description = $data['description'];

        $type->update();

        return to_route('admin.types.show', ['type' => $type]);
    }

    public function destroy($slug)
    {
        $type = Type::where('slug', $slug)->firstOrFail();
        // ciclo per far si che l'eliminazione funzioni
        foreach ($type->projects as $project) {
            $project->type_id = 1;
            $project->update();
        }

        $type->delete();
        return to_route('admin.types.index')->with('delete_success', $type);
    }
}
