@extends('admin.layouts.base')

@section('contents')

<h1 class="text-center">Inserisci un nuovo Progetto</h1>
<form
method="POST"
action="{{ route('admin.projects.store') }}"
enctype="multipart/form-data"
novalidate>
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" 
        class="form-control @error('title') is-invalid @enderror" id="title" 
        name="title" 
        value="{{old('title')}}">
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
        name="image"
        {{-- accept="image/* --}}
        >
        <div class="invalid-feedback">
            @error('image')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-select" aria-label="type" id="type" name="type_id">
            <option selected>Open this select menu</option>
            @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
            <div class="invalid-feedback">
                @error('type')
                {{ $message }}
                @enderror
            </div>
        </select>
    </div>

    <div class="mb-3">
        <h3>Tags</h3>
        @foreach ($technologies as $technology)
        <div class="form-check">
            <input 
            type="checkbox"
            class="form-check-input"
            id="technology{{ $technology->id }}"
            name="technologies[]"
            value="{{ $technology->id }}"
            @if (in_array($technology->id, old('technologies', []))) checked @endif>
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
        class="form-control @error('author') is-invalid @enderror" id="author" 
        name="author" 
        value="{{old('author')}}">
        <div class="invalid-feedback">
            @error('author')
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
        value="{{old('url_github')}}">
        <div class="invalid-feedback">
            @error('url_github')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control @error ('description') is-invalid @enderror" 
        name="description" 
        id="description"
        rows="3">{{ old('description') }}</textarea>
        <div class="invalid-feedback">
            @error('description')
            {{ $message }}
            @enderror
        </div>
    </div>

    <button class="btn btn-primary">Save</button>
</form>

@endsection