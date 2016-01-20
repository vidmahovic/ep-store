@if($cancelled->isEmpty())
    <h4>Ni preklicanih naročil.</h4>
@else
    <table class="table table-hover order-list">
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
    @foreach($cancelled as $order)
        <tr class="order-list__item">
            <td>
                <button class="btn btn-default btn-xs accordion-toggle" data-toggle="collapse" data-target="#order{{$order->id}}">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </button>
            </td>
            <td>{{$order->id}}</td>
            <td>{{$order->created_at}}</td>
            <td><a href="{{ route('user.customers.show', [$order->ordered_by]) }}">{{$order->subscriber->user->name }} {{ $order->subscriber->user->surname }}</a></td>
            <td>{!! $order->getStatusSpan() !!}</td>
            <td>{{ $order->acquirer->user->name }} {{ $order->acquirer->user->surname }}</td>
<!--            <td>
                <div class="btn-group" role="group" aria-label="...">
                    <button type="submit" class="btn btn-success btn-xs confirm">Potrdi</button>
                    <button type="button" class="btn btn-warning btn-xs cancel">Prekliči</button>
                </div>
            </td>-->
        </tr>
        @include('user.activity.order-details', ['order' => $order])
    @endforeach
    </tbody>
    </table>
@endif