@extends('admin.app')

@section('content')
    <div class="container">
        <h1>Produtos</h1>

        <a class="btn btn-default" href="{{ route('admin.products.create') }}">Novo Produto</a>
        <br/><br/>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Destacar</th>
                <th>Recomendar</th>
                <th>Ação</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->category->name }}</td>
                <td>@if ($product->featured == '1') Sim @else Não @endif</td>
                <td>@if ($product->recommend == '1') Sim @else Não @endif</td>
                <td>
                    <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}">Editar</a> |
                    <a href="{{ route('admin.products.images', ['id' => $product->id]) }}">Imagens</a> |
                    <a href="{{ route('admin.products.destroy', ['id' => $product->id]) }}">Excluir</a>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $products->render() !!}
    </div>
@endsection
