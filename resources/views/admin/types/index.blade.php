@extends('layouts.app')

@section('content')
    @if (session('delete_confirm'))
        <div class="alert alert-success" role="alert">
            {{ session('delete_confirm') }}
        </div>
    @endif

    @if (session('edit_confirm'))
        <div class="alert alert-success" role="alert">
            {{ session('edit_confirm') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            <h4>Attenzione!</h4>
            <span class="d-block">{{ session('error') }}</span>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <h4>Attenzione!</h4>
            <span class="d-block">{{ $errors->first() }}</span>
        </div>
    @endif


    <h2>Gestione tipo progetto</h2>

    <div class="row">
        <div class="col-4">

            <form class="d-flex justify-content-between" action="{{ route('admin.types.store') }}" method="post">
                @csrf

                <input type="text" name="name" class="form-control me-2" placeholder="Aggiungi tipo">
                <button class="btn btn-success">Invia</button>
            </form>

            <table class="table mt-5">
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <td>
                                <form id="form-edit-{{ $type->id }}" action="{{ route('admin.types.update', $type) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')

                                    <input class="form-control" type="text" name="name" value="{{ $type->name }}">
                                </form>
                            </td>
                            <td>
                                <button class="btn btn-warning" type="submit"
                                    onclick="submitEditTypeForm({{ $type->id }})">
                                    Aggiorna
                                </button>
                            </td>
                            <td>
                                @include('admin.partials.delete_form', [
                                    'route' => route('admin.types.destroy', $type),
                                    'message' => "Sei sicuro di voler definitivamente eliminare questo tipo? Tutti i dati di $type->name verranno persi.",
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <script>
        function submitEditTypeForm(id) {
            const form = document.getElementById(`form-edit-${id}`);
            form.submit();
        }
    </script>
@endsection
