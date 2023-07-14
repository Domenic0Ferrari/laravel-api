@extends('admin.layouts.base')

@section('contents')

<h1 class="text-center">{{ $type->name }}</h1>
<p class="text-center">{{ $type->description }}</p>

<h2 class="text-center">Progetti in this type</h2>
<ul>
    @foreach ($type->projects as $project)

    <li><a href="{{ route('admin.projects.show', ['project' => $project]) }}">{{ $project->title }}</a></li>
        
    @endforeach
</ul>
@endsection