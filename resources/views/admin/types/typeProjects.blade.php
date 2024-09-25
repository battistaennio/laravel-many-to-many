@extends('layouts.app')

@section('content')
    <h2>Elenco progetti per tipo</h2>

    @foreach ($types as $type)
        <h4 class="my-4">{{ $type->name }}:</h4>
        <ul class="list-group">

            @foreach ($type->projects as $project)
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{ $project->name }}</span>
                    <a class="btn btn-success" href="{{ route('admin.projects.show', $project) }}">Dettagli</a>
                </li>
            @endforeach

        </ul>
    @endforeach
@endsection
