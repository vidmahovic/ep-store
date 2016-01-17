<tr>
    <td colspan="12" class="hiddenRow">
        <div class="accordian-body collapse" id="order{{$order->id}}">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><strong>Ime produkta</strong></th>
                    <th><strong>Cena kos</strong></th>
                    <th><strong>Količina</strong></th>
                    <th><strong>Skupna cena</strong></th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products()->get() as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}€</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ number_format($product->pivot->quantity * $product->price, 2) }}€</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </td>
</tr>