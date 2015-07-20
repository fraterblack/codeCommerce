@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Valor</td>
                            <td class="price">Quantidade</td>
                            <td class="price">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($cart->all() as $k=>$item)
                        <?php
                            $product = $products->find($k);
                        ?>
                        <tr>
                            <td class="cart_product">
                                <a href="{{ route('store.product', ['id' => $k, 'slug' => $item['name']]) }}">
                                    @if(count($product->images))
                                        <img src="{{ url('uploads/'. $product->images->first()->id .".". $product->images->first()->extension) }}" width="100" alt=""/>
                                    @else
                                        <img src="{{ url('images/no-img.jpg') }}" width="100" alt=""/>
                                    @endif
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('store.product', ['id' => $k, 'slug' => $item['name']]) }}">{{ $item['name'] }}</a></h4>
                                <p>Código: {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{ number_format($item['price'], 2, ',', '.') }}
                            </td>
                            <td class="cart_quantity">
                                <div class="form-group">
                                    <div class="input-group" style="width: 110px">
                                        <a href="{{ route('cart.update', ['id' => $k, 'qtd' => ($item['qtd'] - 1)])}}" class="input-group-addon btn btn-default">-</a>
                                        {!! Form::text('', $item['qtd'], [
                                        'class' => 'cart_quantity_input form-control',
                                        'data-id' => $k,
                                        'data-uri' => route('cart.update', ['id' => $k]),
                                        'style' => 'text-align: center'
                                        ]) !!}
                                        <a href="{{ route('cart.update', ['id' => $k, 'qtd' => ($item['qtd'] + 1)])}}" class="input-group-addon btn btn-default">+</a>
                                    </div>
                                </div>
                            </td>
                            <td class="cart_total">
                                R$ {{ number_format($item['price'] * $item['qtd'], 2, ',', '.') }}
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{ route('cart.remove', ['id' => $k]) }}">Remover</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"><p>Nenhum item encontrado.</p></td>
                        </tr>
                    @endforelse
                        <tr class="cart_menu">
                            <td colspan="6">
                                <div class="pull-right">
                                    <span style="margin-right: 100px">TOTAL: R$ {{ number_format($cart->getTotal(), 2, ',', '.') }}</span>

                                    <a class="btn btn-success" href="#">Finalizar a compra</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection