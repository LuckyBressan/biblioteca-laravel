@extends('layouts.default')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>

    <a href="{{ route('categorias.index') }}">Voltar</a>

    <br>
    <br>

    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <div style="color: red;">
                {{ $err }}
            </div>
        @endforeach
    @endif

    <form action="{{ route('categorias.update', $categoria->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div>
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $categoria->titulo) }}">
        </div>
        <div>
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao">{{ old('descricao', $categoria->descricao) }}</textarea>
        </div>
        <input type="submit" value="Salvar">
    </form>

@endsection
