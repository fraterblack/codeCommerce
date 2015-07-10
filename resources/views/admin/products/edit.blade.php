@extends('admin.app')

@section('content')
    <div class="container">
        <h1>Editar Produto: {{ $product->name }}</h1>
        @if ($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => ['admin.products.update', $product->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('category_id', 'Categoria:') !!}
            {!! Form::select('category_id', $categories, $product->category->id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Descrição:') !!}
            {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tags', 'Tags:') !!}
            {!! Form::textarea('tags', $product->tag_list, ['class' => 'form-control', 'rows' => '2']) !!}
        </div>

        <div class="row">
            <div class="col-xs-5 col-md-2">
                <div class="form-group">
                    {!! Form::label('price', 'Preço:') !!}
                    {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-5 col-md-2">
                <div class="form-group">
                    {!! Form::label('featured', 'Destacar:') !!}
                    {!! Form::select('featured', ['1' => 'Sim', '0' => 'Não'], (int) $product->featured) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-5 col-md-2">
                <div class="form-group">
                    {!! Form::label('recommend', 'Recomendar:') !!}
                    {!! Form::select('recommend', ['1' => 'Sim', '0' => 'Não'], (int) $product->recommend) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::submit('Salvar Produto', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.products') }}">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
