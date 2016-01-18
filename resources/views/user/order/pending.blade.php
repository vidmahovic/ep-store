@if($pending->get()->isEmpty())
    <h4>Ni nepotrjenih naročil</h4>
@else
<table class="table table-hover order-list">
    <thead>
    <tr>
        <th></th>
        <th>Številka naročila</th>
        <th>Datum</th>
        <th>Stranka</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($pending->get() as $order)
        <tr class="order-list__item accordion-toggle" data-toggle="collapse" data-target="#order{{$order->id}}">
            <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
            <td>{{$order->id}}</td>
            <td>{{$order->created_at}}</td>
            <td><a href="{{ route('user.customers.show', [$order->ordered_by]) }}">{{$order->subscriber->user->name }} {{ $order->subscriber->user->surname }}</a></td>
            <td>
                <div class="btn-group" role="group" aria-label="...">
                    <button type="submit" class="btn btn-success btn-xs confirm">Potrdi</button>
                    <button type="button" class="btn btn-warning btn-xs cancel">Prekliči</button>
                </div>
            </td>
        </tr>
        @include('user.activity.order-details', ['order' => $order])
    @endforeach
    </tbody>
</table>
@endif