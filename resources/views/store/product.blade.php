@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')
<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                @if(count($product->images))
                    <img src="{{ url('uploads/'. $product->images->first()->id .".". $product->images->first()->extension) }}" width="200" alt=""/>
                @else
                    <img src="{{ url('images/no-img.jpg') }}" width="200" alt=""/>
                @endif
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($product->images as $image)
                        <a href="#"><img src="{{ url('uploads/'. $image->id .".". $image->extension) }}" alt="" width="80"></a>
                       @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <h2>{{ $product->category->name }} :: {{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <span><span>R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                        <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i> Adicionar no Carrinho
                        </a>
                </span>
                <div>
                    Tags:
                    <?php $i = 1; ?>
                    @foreach($product->tags as $tag)
                        @if($i > 1) , @endif
                        <a href="{{ route('store.tag', ['id' => $tag->id, 'tag' => str_slug($tag->name)]) }}">{{ $tag->name }}</a>
                        <?php $i++; ?>
                    @endforeach
                </div>
            </div>
            <!--/product-information-->
        </div>
    </div>
    <!--/product-details-->
</div>
@endsection