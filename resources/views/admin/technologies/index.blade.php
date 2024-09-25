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


    <h2>Gestione tecnologie progetto</h2>

    <div class="row">
        <div class="col-4">

            <form class="d-flex justify-content-between" action="{{ route('admin.technologies.store') }}" method="post">
                @csrf

                <input type="text" name="name" class="form-control me-2" placeholder="Aggiungi tipo">
                <button class="btn btn-success">Invia</button>
            </form>

            <table class="table mt-5">
                <tbody>
                    @foreach ($techs as $tech)
                        <tr>
                            <td>
                                <form id="form-edit-{{ $tech->id }}"
                                    action="{{ route('admin.technologies.update', $tech) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <input class="form-control" type="text" name="name" value="{{ $tech->name }}">
                                </form>
                            </td>
                            <td>
                                <button class="btn btn-warning" type="submit"
                                    onclick="submitEditTechForm({{ $tech->id }})">
                                    Aggiorna
                                </button>
                            </td>
                            <td>
                                @include('admin.partials.delete_form', [
                                    'route' => route('admin.technologies.destroy', $tech),
                                    'message' => "Sei sicuro di voler definitivamente eliminare questa tecnologia? Tutti i dati di $tech->name verranno persi.",
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <script>
        function submitEditTechForm(id) {
            const form = document.getElementById(`form-edit-${id}`);
            form.submit();
        }
    </script>
@endsection
