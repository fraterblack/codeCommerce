@extends('admin.app')

@section('content')
    <div class="container">
        <h1>Imagens do Produto: {{ $product->name }}</h1>

        <a class="btn btn-default" href="{{ route('admin.products.images.create', ['id' => $product->id]) }}">Nova Imagem</a>
        <br/><br/>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Extensão</th>
                <th>Ação</th>
                @foreach($product->images as $image)
            <tr>
            </tr>
                    <td>{{ $image->id }}</td>
                    <td><img src="{{ url('uploads/' . $image->id . '.' . $image->extension) }}" width="80" alt=""/></td>
                    <td>{{ $image->extension }}</td>
                    <td>
                        <a href="{{ route('admin.products.images.destroy', ['id' => $image->id]) }}">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('admin.products') }}" class="btn btn-default">VOLTAR</a>
    </div>
@endsection
