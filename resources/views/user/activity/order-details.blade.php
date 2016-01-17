<div class="row">
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <td><strong>Ime produkta</strong></td>
                        <td class="text-center"><strong>Cena kos</strong></td>
                        <td class="text-center"><strong>Količina</strong></td>
                        <td class="text-right"><strong>Cena</strong></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products()->get() as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td class="text-center">{{ number_format($product->price, 2) }} €</td>
                            <td class="text-center">{{ $product->pivot->quantity }}</td>
                            <td class="text-right">{{ number_format($product->pivot->quantity * $product->price, 2) }} €</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="highrow"></td>
                        <td class="highrow"></td>
                        <td class="highrow"><strong>Cena</strong></td>
                        <td class="highrow">{{ number_format($order->price, 2) }} €</td>
                    </tr>
                    <tr>
                        <td class="highrow"></td>
                        <td class="highrow"></td>
                        <td class="highrow"><strong>Poštnina</strong></td>
                        <td class="highrow">{{ number_format($order->shipping, 2) }} €</td>
                    </tr>
                    <tr>
                        <td class="highrow"></td>
                        <td class="highrow"></td>
                        <td class="highrow"><strong>Skupaj</strong></td>
                        <td class="highrow">{{ number_format($order->shipping + $order->price, 2) }} €</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


{{--
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th><strong>Ime produkta</strong></th>
                            <th><strong>Cena kos</strong></th>
                            <th><strong>Količina</strong></th>
                            <th><strong>Cena</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products() as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}€</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ number_format($product->quantity * $product->price, 2) }}€</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td><strong>Cena</strong></td>
                            <td>{{ $order->price }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><strong>Poštnina</strong></td>
                            <td>{{ $order->shipping }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><strong>Skupaj</strong></td>
                            <td>{{ number_format($order->shipping + $order->price, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
--}}
