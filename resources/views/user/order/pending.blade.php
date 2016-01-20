@if($pending->isEmpty())
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
    @foreach($pending as $order)
        <tr class="order-list__item" data-id="{{$order->id}}">
            <td>
                <button class="btn btn-default btn-xs accordion-toggle" data-toggle="collapse" data-target="#order{{$order->id}}">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </button>
            </td>
            <td>{{$order->id}}</td>
            <td>{{$order->created_at}}</td>
            <td><a href="{{ route('user.customers.show', [$order->ordered_by]) }}">{{$order->subscriber->user->name }} {{ $order->subscriber->user->surname }}</a></td>
            <td>
                <div class="row">
                    <div class="col col-sm-6">
                        {!! Form::open(['url' => 'user/orders/'.$order->id, 'method' => 'PUT']) !!}
                        <button type="submit" class="btn btn-success btn-xs">Potrdi</button>
                        {!! Form::close() !!}
                    </div>
                    <div class="col col-sm-6">
                        {!! Form::open(['url' => 'user/orders/'.$order->id.'/deactivate', 'method' => 'PUT']) !!}
                        <button type="submit" class="btn btn-warning btn-xs">Prekliči</button>
                        {!! Form::close() !!}
                    </div>
                <div class="btn-group" role="group" aria-label="...">
                    {!! Form::open(['url' => 'user/orders/'.$order->id, 'method' => 'PUT']) !!}
                    <input type="hidden" name="state_id" value="2">
                    <button type="submit" class="btn btn-success btn-xs">Potrdi</button>
                    {!! Form::close() !!}
                    {!! Form::open(['url' => 'user/orders/'.$order->id.'/deactivate', 'method' => 'PUT']) !!}
                    <button type="submit" class="btn btn-warning btn-xs">Prekliči</button>
                    {!! Form::close() !!}
                </div>
            </td>
        </tr>
        @include('user.activity.order-details', ['order' => $order])
    @endforeach
    </tbody>
</table>
@endif