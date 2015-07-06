@extends('app')

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
            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Descrição:') !!}
            {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
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
                    {!! Form::select('featured', ['true' => 'Sim', 'false' => 'Não'], $product->featured) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-5 col-md-2">
                <div class="form-group">
                    {!! Form::label('recommend', 'Recomendar:') !!}
                    {!! Form::select('recommend', ['true' => 'Sim', 'false' => 'Não'], $product->recommend) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::submit('Salvar Produto', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
