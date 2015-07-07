@extends('app')

@section('content')
    <div class="container">
        <h1>Criar Produto</h1>
        @if ($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'admin.products.store']) !!}

        <div class="form-group">
            {!! Form::label('category_id', 'Categoria:') !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Descrição:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="row">
            <div class="col-xs-5 col-md-2">
                <div class="form-group">
                    {!! Form::label('price', 'Preço:') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-5 col-md-2">
                <div class="form-group">
                    {!! Form::label('featured', 'Destacar:') !!}
                    {!! Form::select('featured', ['1' => 'Sim', '0' => 'Não'], '0') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-5 col-md-2">
                <div class="form-group">
                    {!! Form::label('recommend', 'Recomendar:') !!}
                    {!! Form::select('recommend', ['1' => 'Sim', '0' => 'Não'], '0') !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::submit('Adicionar Produto', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.products') }}">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
