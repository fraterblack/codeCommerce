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

<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::textarea('tag_list', null, ['class' => 'form-control', 'rows' => '2']) !!}
</div>

<div class="row">
    <div class="col-xs-5 col-md-2">
        <div class="form-group">
            {!! Form::label('featured', 'Destacar:') !!}
            {!! Form::select('featured', [0 => 'Não', 1 => 'Sim'], null) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-5 col-md-2">
        <div class="form-group">
            {!! Form::label('recommend', 'Recomendar:') !!}
            {!! Form::select('recommend', [0 => 'Não', 1 => 'Sim'], null) !!}
        </div>
    </div>
</div>