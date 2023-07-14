<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    private $validations = [
        'title' => 'required|string|min:5|max:100',
        'type_id' => 'required|integer|exists:types,id',
        'author' => 'required|string|min:5|max:30',
        'url_github' => 'required|url|max:200',
        'image' => 'nullable|image|max:2048',
        'description' => 'required|string',
    ];

    private $validation_messages = [
        // title
        'title.required' => 'Il campo titolo è obbligatorio',
        'title.min' => 'Il campo titolo deve avere almeno :min caratteri',
        'title.max' => 'Il campo titolo deve avere massimo :max caratteri',
        // exist
        'type_id.exists' => 'Valore non valido',
        // author
        'author.required' => 'Il campo autore è obbligatorio',
        'author.min' => 'Il campo Autore deve avere almeno :min caratteri',
        'author.max' => 'Il campo Autore deve avere massimo :max caratteri',
        // url
        'url_github.required' => 'Il campo Github è obbligatorio',
        'url_github.url' => 'Il campo Github deve essere un url valido',
        'url_github.max' => 'Il campo Github deve avere massimo :max caratteri',
        // image
        'image.max' => 'Il campo Immagine non può superare 2mb',
        // description
        'description.required' => 'Il campo Descrizione è obbligatorio',
    ];

    public function index()
    {
        $projects = Project::paginate(5);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    public function store(Request $request)
    {
        $request->validate($this->validations, $this->validation_messages);

        $data = $request->all();

        $imagePath = Storage::put('uploads', $request->has('image'));

        $newProject = new Project();
        $newProject->title = $data['title'];
        $newProject->slug = Project::slugger($data['title']);
        $newProject->type_id = $data['type_id'];
        $newProject->author = $data['author'];
        $newProject->url_github = $data['url_github'];
        $newProject->image = $imagePath;
        $newProject->description = $data['description'];

        $newProject->save();

        $newProject->technologies()->sync($data['technologies'] ?? []);

        return to_route('admin.projects.show', ['project' => $newProject]);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('admin.projects.show', compact('project'));
    }

    public function edit($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    public function update(Request $request, $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        $request->validate($this->validations, $this->validation_messages);

        $data = $request->all();

        if ($request->has('image')) {
            // salvo la nuova eventuale immagine
            $imagePath = Storage::put('uploads', $data['image']);
            // elimino l'immagine vecchia se presente una nuova
            if ($project->image) {
                Storage::delete($project->image);
            }
            // aggiorno i dati nel db con l'indirizzo dell'immagine nuova
            $project->image = $imagePath;
        }

        // aggiornare i dati nel database se validi
        $project->title = $data['title'];
        $project->type_id = $data['type_id'];
        $project->author = $data['author'];
        $project->url_github = $data['url_github'];
        $project->description = $data['description'];
        // aggiornare i dati
        $project->update();

        $project->technologies()->sync($data['technologies'] ?? []);

        // reindirizza alla pagina show
        return to_route('admin.projects.show', ['project' => $project]);
    }

    public function destroy($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        if ($project->image) {
            Storage::delete($project->image);
        }

        // dissocio le tecnologie associate 
        $project->technologies()->detach();

        $project->delete();
        return to_route('admin.projects.index')->with('delete_success', $project);
    }
}
