@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <h4>Attenzione!</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.update', $project) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome progetto:</label>
            <input value="{{ old('name', $project->name) }}" name="name" type="text"
                class="form-control @error('name') is-invalid @enderror" id="name" placeholder="add title">
            @error('name')
                <small class="text-danger">*{{ $message }}</small>
            @enderror

        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Data di inizio</label>
            <input value="{{ old('start_date', $project->start_date) }}" name="start_date" type="text"
                class="form-control @error('start_date') is-invalid @enderror" id="start_date" placeholder="add start_date">
            @error('start_date')
                <small class="text-danger">*{{ $message }}</small>
            @enderror

        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Progetto di tipo:</label>

            <select name="type_id" class="form-select" aria-label="Default select example">
                <option value="" selected>Seleziona il tipo</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" @if (old('type_id', $project->type?->id) == $type->id) selected @endif>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="repo_link" class="form-label input-group">Link repository</label>

            <div class="input-group">
                <input value="{{ old('repo_link', $project->repo_link) }}" name="repo_link" type="text"
                    class="form-control input-group @error('repo_link') is-invalid @enderror" id="repo_link"
                    placeholder="add repo_link">
            </div>
            @error('repo_link')
                <small class="text-danger">*{{ $message }}</small>
            @enderror

        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" placeholder="add description">{{ old('description', $project->description) }}</textarea>
        </div>


        <div class="mb-3">
            <button type="submit" href="#" class="btn btn-success">Modifica</button>
            <button type="reset" href="#" class="btn btn-danger">Annulla</button>
        </div>

    </form>
@endsection
