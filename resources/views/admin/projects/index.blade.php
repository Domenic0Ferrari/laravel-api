@extends('admin.layouts.base')

@section('contents')
<h1 class="text-center mt-3 mb-3">My Project</h1>

@if (session('delete_success'))
@php
    $project = session('delete_success')
@endphp
    <div class="alert alert-danger">
        Il progetto "{{ $project->title }}" è stato eliminato per sempre!
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Type</th>
            <th scope="col">Technologies</th>
            <th scope="col">Author</th>
            <th scope="col">Link</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
            <th scope="row">{{ $project->id }}</th>
            <td>{{ $project->title }}</td>
            <td>
                <a href="{{ route('admin.types.show', ['type' => $project->type]) }}">{{ $project->type->name }}</a>
            </td>
            {{-- <td>{{ implode(', ', $project->technologies->pluck('name')->all()) }}</td> --}}
            <td>
                @foreach ($project->technologies as $technology)
                    <a href="{{ route('admin.technologies.show', ['technology' => $technology]) }}">{{ $technology->name }}</a> {{ !$loop->last ? ',' : '' }}
                    {{-- @if(!$loop->last),@endif --}}
                    {{-- la variabile loop la crea laravel quando in blade facciamo un ciclo, per inserire le virgole e quando siamo nell'ultima per non inserirla --}}
                @endforeach
            </td>
            <td>{{ $project->author }}</td>
            <td><a href="{{ $project->url_github}}">{{ $project->url_github }}</a></td>
            <td>
                <a href="{{ route('admin.projects.show', ['project' => $project]) }}" class="btn btn-primary">View</a>
                <a href="{{ route('admin.projects.edit', ['project' => $project]) }}" class="btn btn-warning">Edit</a>
                <button
                type="button"
                class="btn btn-danger js-delete-2"
                data-bs-toggle="modal"
                data-bs-target="#deleteModal"
                data-id="{{ $project->slug }}">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>  

<div
class="modal fade"
id="deleteModal"
data-bs-backdrop="static"
data-bs-keyboard="false"
tabindex="-1"
aria-labelledby="deleteModalLabel"
aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Conferma eliminazione!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Sei sicuro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <form
                action="{{ route('admin.projects.destroy', ['project' => $project]) }}"
                method="POST"
                class="d-inline-block" 
                id="confirm-delete-2">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{ $projects->links() }}
@endsection