@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Produto</h1>
        <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product['name'] ?? '' }}">
            </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea name="description" id="description" class="form-control">{{ $product['description'] ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Preço:</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ $product['price'] ?? '' }}">
            </div>
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

        @if(session()->has('product'))
            <div class="alert alert-success" role="alert">
                Produto criado com sucesso!
                <br>
                Nome: {{ session('product')['name'] }}
                <br>
                Descrição: {{ session('product')['description'] }}
                <br>
                Preço: {{ session('product')['price'] }}
            </div>
        @endif
    </div>
@endsection
