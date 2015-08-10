@extends('admin.app')

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

        @include('admin.products._form')

        <div class="form-group">
            {!! Form::submit('Adicionar Produto', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.products') }}">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
