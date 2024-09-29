@extends('layouts.app')

@section('content')
    <h2>Nuovo Progetto</h2>

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

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome progetto</label>
            <input value="{{ old('name') }}" name="name" type="text"
                class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inserisci il nome">
            @error('name')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Data di inizio</label>
            <input value="{{ old('start_date') }}" name="start_date" type="text"
                class="form-control @error('start_date') is-invalid @enderror" id="start_date"
                placeholder="Inserisci la data di inizio del progetto">
            @error('start_date')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Progetto di tipo:</label>

            <select name="type_id" class="form-select" aria-label="Default select example">
                <option value="" selected>Seleziona il tipo</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="technologies" class="form-label d-block">Tecnologia utilizzata:</label>

            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                @foreach ($techs as $tech)
                    <input value="{{ $tech->id }}" name="techs[]" type="checkbox" class="btn-check"
                        id="tech-{{ $tech->id }}" autocomplete="off" @if (in_array($tech->id, old('techs', []))) checked @endif>

                    <label class="btn btn-outline-primary" for="tech-{{ $tech->id }}">{{ $tech->name }}</label>
                @endforeach

            </div>
        </div>

        <div class="mb-3">
            <label for="repo_link" class="form-label">Link repository</label>

            <div class="input-group">

                <input value="{{ old('repo_link') }}" name="repo_link" type="text"
                    class="form-control input-group @error('repo_link') is-invalid @enderror" id="repo_link"
                    placeholder="Inserisci il link della repository">
            </div>

            @error('repo_link')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="img_path" class="form-label">Immagine</label>
            <input name="img_path" class="form-control" type="file" id="img_path" onchange="showImage(event)">

            <img src="/img/no-img.png" class="thumb mt-2" id="thumb">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" class="form-control" id="description" placeholder="Inserisci la descrizione">{{ old('description') }}</textarea>
        </div>


        <div class="mb-3">
            <button type="submit" href="#" class="btn btn-success">Invia</button>
            <button type="reset" href="#" class="btn btn-danger">Annulla</button>
        </div>

    </form>

    <script>
        function showImage(event) {
            const thumb = document.getElementById('thumb');
            thumb.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection


@section('titlePage')
    Comics List
@endsection
