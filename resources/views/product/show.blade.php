@extends('layouts.app')

@section('content')
    <h1>Detalhes do Produto</h1>

    <h2>{{ $product->name }}</h2>
    <p>{{ $product->description }}</p>
    <p>{{ $product->price }}</p>

    <a href="{{ route('products.edit', ['id' => $product->id]) }}">Editar</a>

    <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
    </form>

    <a href="{{ route('products.index') }}">Voltar para a lista de produtos</a>
@endsection
