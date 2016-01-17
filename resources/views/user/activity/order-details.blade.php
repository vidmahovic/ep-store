<div class="collapse" id="order-'{{ $order->id }}'">
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
                    @foreach($order->products() as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td class="text-center">{{ $product->price }}€</td>
                            <td class="text-center">{{ $product->quantity }}</td>
                            <td class="text-right">{{ number_format($product->quantity * $product->price, 2) }}€</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td class="highrow"></td>
                            <td class="highrow"></td>
                            <td class="highrow"><strong>Cena</strong></td>
                            <td class="highrow">{{ $order->price }}</td>
                        </tr>
                        <tr>
                            <td class="highrow"></td>
                            <td class="highrow"></td>
                            <td class="highrow"><strong>Poštnina</strong></td>
                            <td class="highrow">{{ $order->shipping }}</td>
                        </tr>
                        <tr>
                            <td class="highrow"></td>
                            <td class="highrow"></td>
                            <td class="highrow"><strong>Skupaj</strong></td>
                            <td class="highrow">{{ number_format($order->shipping + $order->price, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>