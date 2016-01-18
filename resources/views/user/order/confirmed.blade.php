@if($confirmed->isEmpty())
    <h4>Ni potrjenih naročil</h4>
@else
<table class="table table-hover order-list">
    <thead>
    <tr>
        <th></th>
        <th>Številka naročila</th>
        <th>Datum</th>
        <th>Šifra stranke</th>
        <th>Prevzel</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($confirmed as $order)
        <tr class="order-list__item" data-id="{{$order->id}}">
            <td>
                <button class="btn btn-default btn-xs accordion-toggle" data-toggle="collapse" data-target="#order{{$order->id}}">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </button>
            </td>
            <td>{{$order->id}}</td>
            <td>{{$order->created_at}}</td>
            <td>{{$order->ordered_by }}</td>
            <td>{{ $order->acquirer()->first()->user->name }} {{ $order->acquirer()->first()->user->surname }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="...">
                    <button type="submit" class="btn btn-warning btn-xs deactivate">Storniraj</button>
                </div>
            </td>
        </tr>
        @include('user.activity.order-details', ['order' => $order])
    @endforeach
    </tbody>
</table>
@endif
