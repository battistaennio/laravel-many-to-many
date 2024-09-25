@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Benvenuto {{ Auth::user()->name }}!</h3>

    <h5>Sono presenti {{ $count_projects }} progetti -> <a class="btn btn-outline-primary"
            href="{{ route('admin.projects.index') }}">Vai alla lista</a></h5>
    <h5>Sono presenti {{ $count_types }} tipi -> <a class="btn btn-outline-primary"
            href="{{ route('admin.types.index') }}">Vai alla lista</a></h5>
    <h5>Sono presenti {{ $count_techs }} tecnologie -> <a class="btn btn-outline-primary"
            href="{{ route('admin.technologies.index') }}">Vai alla lista</a>
    </h5>
@endsection
