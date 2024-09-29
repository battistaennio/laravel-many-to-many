@extends('layouts.app')

@section('content')
    @if (session('edit_confirm'))
        <div class="alert alert-success" role="alert">
            {{ session('edit_confirm') }}
        </div>
    @endif

    @if (session('create_confirm'))
        <div class="alert alert-success" role="alert">
            {{ session('create_confirm') }}
        </div>
    @endif


    <h1 class="text-center">
        Dettaglio progetto
        <a class="btn btn-warning" title="Modifica" href="{{ route('admin.projects.edit', $project) }}">
            <i class="fa-solid fa-pen"></i>
        </a>

        @include('admin.partials.delete_form', [
            'route' => route('admin.projects.destroy', $project),
            'message' => "Sei sicuro di voler definitivamente eliminare questo progetto? Tutti i dati di $project->name verranno persi.",
        ])

        <br>
        "<strong>{{ $project->name }}</strong>"
    </h1>

    <div class="row my-5 text-center">
        <div class="col-6">
            <h3>Nome Progetto:</h3>
            <h5>{{ $project->name }}</h5>
        </div>

        <div class="col-6">
            <h3>Data di inizio:</h3>
            <h5>{{ date('d/m/Y', strtotime($project->start_date)) }}</h5>
        </div>
    </div>

    <div class="row my-5 text-center">
        <div class="col-6">
            <h3>Progetto di tipo:</h3>
            <h5>{{ $project->type ? $project->type->name : 'tipo non disponibile' }}</h5>
        </div>

        <div class="col-6">
            <h3>Tecnologia utilizzata:</h3>

            @forelse ($project->technologies as $tech)
                <h5>{{ $tech->name }}</h5>
            @empty
                <h5>tecnologia non disponibile</h5>
            @endforelse
        </div>
    </div>

    <div class="row my-5 text-center">
        <div class="col-6">
            <h3>Slug:</h3>
            <h5>{{ $project->slug }}</h5>
        </div>

        <div class="col-6">
            <h3>Link repository:</h3>
            <h5>{{ $project->repo_link }}</h5>
        </div>
    </div>

    <div class="row my-5 text-center">
        <div class="col">
            <h3>Descrizione:</h3>
            <h5>{{ $project->description }}</h5>
        </div>
    </div>


    <div class="row my-5 text-center">
        <div class="col">
            <h3>Immagine:</h3>
            <img src="{{ asset('storage/' . $project->img_path) }}" alt="{{ $project->img_name }}"
                onerror="this.src='/img/no-img.png'">
        </div>
    </div>


    <div class="col my-5 text-center">
        <a class="btn btn-warning" href="{{ route('admin.projects.index') }}">Torna alla lista</a>
    </div>
@endsection
