@extends('admin.app')

@section('content')
    <div class="container">
        <h1>Editar Categoria: {{ $category->name }}</h1>
        @if ($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => ['admin.categories.update', $category->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Descrição:') !!}
            {!! Form::textarea('description', $category->description, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Salvar Categoria', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.categories') }}">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
