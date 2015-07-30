@extends('store.store')

@section('content')
<div class="col-sm-12">
    <h3>Meus pedidos</h3>

    <table class="table table-condensed">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Itens</th>
            <th class="text-center">Valor</th>
            <th class="text-center">Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                    <ul class="list-unstyled">
                        @foreach($order->items as $item)
                            <li>{{ $item->product->name }}</li>
                        @endforeach
                    </ul>
                </td>
                <td class="text-center">{{ number_format($order->total, 2, ',', '.') }}</td>
                <td class="text-center">{{ $order->text_status }}</td>
                <td></td>
            </tr>
        @endforeach

        </tbody>
    </table>

</div>
@endsection