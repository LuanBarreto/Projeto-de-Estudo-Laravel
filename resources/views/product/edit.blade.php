<h1>Editar Produto</h1>

<form method="POST" action="{{ route('products.update', $product->id) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ $product->name }}" required>
    </div>
    <div>
        <label for="description">Descrição:</label>
        <textarea name="description" id="description" required>{{ $product->description }}</textarea>
    </div>
    <div>
        <label for="price">Preço:</label>
        <input type="number" name="price" id="price" value="{{ $product->price }}" required>
    </div>
    <div>
        <label for="category_id">Categoria</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <button type="submit">Salvar</button>
        <a href="{{ route('products.index') }}">Cancelar</a>
    </div>
</form>
