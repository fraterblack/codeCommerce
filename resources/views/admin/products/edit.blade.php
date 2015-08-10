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

        {!! Form::model($product, ['route' => ['admin.products.update', $product->id], 'method'=>'put']) !!}

        @include('admin.products._form')



        <div class="form-group">
            {!! Form::submit('Salvar Produto', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.products') }}">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
