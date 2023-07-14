<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    private $validations = [
        'name' => 'required|string|min:5|max:20',
    ];

    private $validation_messages = [
        // name
        'name.required' => 'Il campo Nome è obbligatorio',
        'name.min' => 'Il campo Nome deve avere :min caratteri',
        'name.max' => 'Il campo Nome deve avere :max caratteri',
    ];

    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        // $technologies = Technology::all();
        return view('admin.technologies.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->validations, $this->validation_messages);

        $data = $request->all();

        $newTechnology = new Technology();
        $newTechnology->name = $data['name'];
        $newTechnology->slug = Technology::slugger($data['name']);

        $newTechnology->save();

        return to_route('admin.technologies.show', ['technology' => $newTechnology]);
    }

    public function show($slug)
    {
        $technology = Technology::where('slug', $slug)->firstOrFail();
        return view('admin.technologies.show', compact('technology'));
    }

    public function edit($slug)
    {
        $technology = Technology::where('slug', $slug)->firstOrFail();

        return view('admin.technologies.edit', compact('technology'));
    }

    public function update(Request $request, $slug)
    {
        $technology = Technology::where('slug', $slug)->firstOrFail();
        $request->validate($this->validations, $this->validation_messages);

        $data = $request->all();

        $technology->name = $data['name'];

        $technology->update();

        return to_route('admin.technologies.show', ['technology' => $technology]);
    }

    public function destroy($slug)
    {
        $technology = Technology::where('slug', $slug)->firstOrFail();

        // scollego le tecnologie associate
        $technology->projects()->detach();

        $technology->delete();
        return to_route('admin.technologies.index')->with('delete_success', $technology);
    }
}
