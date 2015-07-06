@extends('app')

@section('content')
    <div class="container">
        <h1>Categorias</h1>

        <a class="btn btn-default" href="{{ route('admin.categories.create') }}">Nova Categoria</a>
        <br/><br/>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ação</th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}">Editar</a> |
                    <a href="{{ route('admin.categories.destroy', ['id' => $category->id]) }}">Excluir</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
