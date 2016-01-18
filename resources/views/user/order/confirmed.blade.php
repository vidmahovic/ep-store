@if($confirmed->get()->isEmpty())
    <h4>Ni potrjenih naročil</h4>
@else
<table class="table table-hover order-list">
    <thead>
    <tr>
        <th>Številka naročila</th>
        <th>Datum</th>
        <th>Šifra stranke</th>
        <th>Prevzel</th>
    </tr>
    </thead>
    <tbody>
    @foreach($confirmed->get() as $order)
        <tr class="order-list__item">
            <td>{{$order->id}}</td>
            <td>{{$order->created_at}}</td>
            <td>{{$order->ordered_by }}</td>
            <td>{{ $order->acquirer()->first()->user->name }} {{ $order->acquirer()->first()->user->surname }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="...">
                    <button type="submit" class="btn btn-warning btn-xs decline">Storniraj</button>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif
