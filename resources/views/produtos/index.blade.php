@extends('layouts.app')

@section('title', 'Colecionáveis')

@section('content')
<div class="sistema">

    {{-- Mensagens visuais --}}
    @if (session('success'))
        <div class="mensagem sucesso">{{ session('success') }}</div>
    @endif

    @if (session('info'))
        <div class="mensagem informacao">{{ session('info') }}</div>
    @endif

    @if (session('error'))
        <div class="mensagem erro">{{ session('error') }}</div>
    @endif

    <h2>Lista de Colecionáveis</h2>

    @foreach($produtos as $produto)
        <div class="produto-card">
            <p><strong>Nome:</strong> {{ $produto->nome }}</p>
            <p><strong>Descrição:</strong> {{ $produto->descricao }}</p>
            <p><strong>Ano de Fabricação:</strong> {{ $produto->ano_fabricacao }}</p>
            <p><strong>Modelo:</strong> {{ $produto->modelo }}</p>
            <p><strong>Empresa:</strong> {{ $produto->empresa }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <p><strong>Raridade:</strong> {{ $produto->raridade }}</p>

            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir</button>
                <a href="{{ route('produtos.edit', $produto->id) }}">
    <button type="button">Editar</button>
</a>
            </form>
        </div>
    @endforeach

    <hr>

    {{-- Formulário de cadastro --}}
    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="descricao" placeholder="Descrição">
        <input type="number" name="ano_fabricacao" placeholder="Ano de Fabricação">
        <input type="text" name="modelo" placeholder="Modelo">
        <input type="text" name="empresa" placeholder="Empresa">

        <div class="preco-input">
            <span>R$</span>
            <input type="number" step="0.01" name="preco" placeholder="Preço">
        </div>

        <button type="submit">Cadastrar</button>
    </form>

</div>
@endsection
