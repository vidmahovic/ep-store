<table class="table table-hover order-list">
    <thead>
    <tr>
        <th>Številka naročila</th>
        <th>Datum</th>
        <th>Stranka</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr class="order-list__item">
            <td>{{$order->id}}</td>
            <td>{{$order->created_at}}</td>
            <td><a href="{{ route('user.customers.show', [$order->ordered_by]) }}">{{$order->subscriber->user->name }} {{ $order->subscriber->user->surname }}</a></td>
            <td>
                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-success btn-xs confirm">Potrdi</button>
                    <button type="button" class="btn btn-warning btn-xs cancel">Prekliči</button>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
