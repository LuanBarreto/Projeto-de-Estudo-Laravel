@extends('layouts.app')

@section('content')
    <h1>Detalhes do Produto</h1>

    <h2>Nome: {{ $product->name }}</h2>
    <p>Descrição: {{ $product->description }}</p>
    <p>Preço: {{ $product->price }}</p>
    @if($product->category)
        <p>Categoria: {{ $product->category->name }}</p>
        <p>Marca: {{ $product->category->brand }}</p>
        <p>Status: {{ $product->category->status ? 'Ativo' : 'Inativo' }}</p>
    @endif

    <a href="{{ route('products.edit', ['id' => $product->id]) }}">Editar</a>

    <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
    </form>

    <a href="{{ route('products.index') }}">Voltar para a lista de produtos</a>
@endsection
