@if($orders->isEmpty())
    <h4>Ni preklicanih naročil.</h4>
@else
    <thead>
    <tr>
        <th>Številka naročila</th>
        <th>Datum</th>
        <th>Stranka</th>
        <th>Status</th>
        <th>Prodajalec</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr class="order-list__item">
            <td>{{$order->id}}</td>
            <td>{{$order->created_at}}</td>
            <td><a href="{{ route('user.customers.show', [$order->ordered_by]) }}">{{$order->subscriber->user->name }} {{ $order->subscriber->user->surname }}</a></td>
            <td>{{ $order->state()->name }}</td>
            <td>{{ $order->acquirer()->user->name }} {{ $order->acquirer()->user->surname }}</td>
<!--            <td>
                <div class="btn-group" role="group" aria-label="...">
                    <button type="submit" class="btn btn-success btn-xs confirm">Potrdi</button>
                    <button type="button" class="btn btn-warning btn-xs cancel">Prekliči</button>
                </div>
            </td>-->
        </tr>
    @endforeach
    </tbody>
@endif