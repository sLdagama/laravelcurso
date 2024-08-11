@extends('Admin.Users.layouts.app')

@section('title', 'Criar Usuário')
@section('content')
    <h1>Novo</h1>
    <form action="{{ route('users.store') }}" method="post">
        @include('Admin.Users.partials.form')
    </form>
@endsection