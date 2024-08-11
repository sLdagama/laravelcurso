@extends('Admin.Users.layouts.app')

@section('title', 'Edição de usuário')
@section('content')
    <h1>Editar o usuário -> {{ $user->name }}</h1>
    @if ($errors->any())'
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @method('PUT')
        @include('Admin.Users.partials.form')
    </form>
@endsection