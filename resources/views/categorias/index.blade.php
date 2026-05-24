@extends('layouts.default')

@section('title', $title)

@section('content')

    <h1>Lista de {{ $title }}</h1>

    <a href="{{ route('categorias.create') }}">Incluir Categoria</a>

    @foreach ($categorias as $categoria)

        <div>
            {{ $categoria->id }} - {{ $categoria->titulo }}
            - <a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
            - <a href="{{ route('categorias.delete', $categoria->id) }}">Excluir</a>
        </div>

    @endforeach

@endsection
