@extends('admin.layouts.base')

@section('contents')

<h1 class="text-center">Modifica il progetto:</h1>
<form
method="POST"
action="{{ route('admin.projects.update', ['project' => $project]) }}" 
enctype="multipart/form-data"
novalidate>
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input
        type="text" 
        class="form-control @error('title') is-invalid @enderror" id="title" 
        name="title" 
        value="{{old('title', $project->title)}}">
        {{-- passare il secondo argomento alla funzione old così che il campo esca già precompilato --}}
        <div class="invalid-feedback">
            @error('title')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="input-group mb-3">
        <label for="image" class="input-group-text">Scegli un'immagine</label>
        <input 
        class="form-control @error('image') is-invalid @enderror" type="file"
        id="image"
        name="image">
        <div class="invalid-feedback">
            @error('image')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label 
        for="type"
        class="form-label">Type</label>
        <select
        class="form-select
        @error('type_id') is invalid @enderror" aria-label="type"
        id="type"
        name="type_id">
            @foreach ($types as $type)
                <option value="{{ $type->id }}" @if (old('type_id', $project->type->id) == $type->id) selected @endif>{{ $type->name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error('type_id')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <h3>Technologies</h3>
        @foreach ($technologies as $technology)
        <div class="form-check">
            <input 
            type="checkbox"
            class="form-check-input"
            id="technology{{ $technology->id }}"
            name="technologies[]"
            value="{{ $technology->id }}"
            @if (in_array($technology->id, old('technologies', $project->technologies->pluck('id')->all()))) checked @endif>
            <label 
            class="form-check-label"
            for="technology{{ $technology->id }}">
            {{ $technology->name }}
            </label>
        </div>
        @endforeach
    </div>

    <div class="mb-3">
        <label for="author" class="form-label">Autore</label>
        <input type="text"
        class="form-control @error('author') is-invalid @enderror"
        id="author"
        name="author"
        value="{{old('author', $project->author)}}">
        <div class="invalid-feedback">
            @error('author')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control @error ('description') is-invalid @enderror" 
        name="description" 
        id="description"
        rows="3">{{ old('description', $project->description) }}</textarea>
        <div class="invalid-feedback">
            @error('description')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="url_github" class="form-label">Github</label>
        <input type="url"
        class="form-control @error('url_github') is-invalid @enderror"
        id="url_github"
        name="url_github"
        value="{{old('url_github', $project->url_github)}}">
        <div class="invalid-feedback">
            @error('url_github')
            {{ $message }}
            @enderror
        </div>
    </div>

    <button class="btn btn-primary mb-3">Save</button>
</form>

<a href="{{ route('admin.projects.index') }}" class="btn btn-primary">
    Torna alla index
</a>

@endsection