@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<div class="sistema">
    <h2>Editar Colecionável</h2>

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nome" value="{{ $produto->nome }}" required>
        <input type="text" name="descricao" value="{{ $produto->descricao }}">
        <input type="number" name="ano_fabricacao" value="{{ $produto->ano_fabricacao }}">
        <input type="text" name="modelo" value="{{ $produto->modelo }}">
        <input type="text" name="empresa" value="{{ $produto->empresa }}">

        <div class="preco-input">
            <span>R$</span>
            <input type="number" name="preco" step="0.01" value="{{ $produto->preco }}">
        </div>

        <button type="submit">Salvar Alterações</button>
        <a href="{{ route('produtos.index') }}">
            <button type="button">Cancelar</button>
        </a>
    </form>
</div>
@endsection
