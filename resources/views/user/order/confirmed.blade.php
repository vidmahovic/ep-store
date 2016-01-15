<table class="table table-hover order-list">
    <thead>
    <tr>
        <th>Številka naročila</th>
        <th>Datum</th>
        <th>Šifra stranke</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr class="order-list__item">
            <td>{{$order->id}}</td>
            <td>{{$order->created_at}}</td>
            <td>{{$order->ordered_by}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-warning btn-xs decline">Storniraj</button>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
