<form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product['name'] }}">
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <textarea class="form-control" id="description" name="description">{{ $product['description'] }}</textarea>
    </div>

    <div class="form-group">
        <label for="price">Preço</label>
        <input type="text" class="form-control" id="price" name="price" value="{{ $product['price'] }}">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
