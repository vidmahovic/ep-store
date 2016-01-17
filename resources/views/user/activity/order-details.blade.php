<div class="collapse" id="order-'{{ $order->id }}'">
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