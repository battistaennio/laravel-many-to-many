@extends('layouts.app')

@section('content')
    <h3>Benvenuto {{ Auth::user()->name }}!</h3>
    <h5>Sono presenti {{ $count_projects }} progetti -> <a href="{{ route('admin.projects.index') }}">Vai alla lista</a></h5>
@endsection
