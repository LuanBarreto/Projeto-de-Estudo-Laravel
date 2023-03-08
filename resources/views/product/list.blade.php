<h1>Lista de Produtos</h1>

@if (count($products) > 0)
    <ul>
        @foreach ($products as $product)
            <li>
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>{{ $product->price }}</p>
                <a href="{{ route('products.show', ['id' => $product->id]) }}" class="btn btn-info">Detalhes</a>
                <a href="{{ route('products.edit', ['id' => $product->id]) }}">Editar</a>
                <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('product.create') }}" class="btn btn-primary">Voltar para o formulário</a>
@else
    <p>Não há produtos cadastrados.</p>
@endif
