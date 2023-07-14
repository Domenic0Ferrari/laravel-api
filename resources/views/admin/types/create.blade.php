@extends('admin.layouts.base')

@section('contents')

<h1 class="text-center">Crea un nuovo Tipo:</h1>
<form method="POST" action="{{ route('admin.types.store') }}" novalidate>
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" 
        class="form-control @error('name') is-invalid @enderror" id="name" 
        name="name" 
        value="{{old('name')}}">
        <div class="invalid-feedback">
            @error('name')
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <input type="text" 
        class="form-control @error('description') is-invalid @enderror" id="description" 
        name="description" 
        value="{{old('description')}}">
        <div class="invalid-feedback">
            @error('description')
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