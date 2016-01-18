@extends('app')

@section('content')
    <section data-section="my-orders">
        <div class="container">
            <div class="row">
                <div class="col col-lg-12">
                    <h2>Pretekli nakupi</h2>
                    @if($orders->isEmpty())
                        <h3>Zgodovina nakupov je prazna.</h3>
                    @else
                        <table class="table table-condensed" style="border-collapse:collapse;">

                            <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Številka naročila</th>
                                <th>Status</th>
                                <th>Cena</th>
                                <th>Poštnina</th>
                                <th>Skupna cena</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($orders as $order)
                                <tr data-toggle="collapse" data-target="#order{{$order->id}}" class="accordion-toggle">
                                        <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                        <td>{{ $order->id }}</td>
                                        <td>@include('user.activity.order-states.order-'.$order->state()->first()->name)</td>
                                        <td>{{ $order->price }} EUR</td>
                                        <td>{{ $order->shipping }} EUR</td>
                                        <td>{{ number_format($order->shipping + $order->price, 2) }} EUR</td>
                                </tr>

                                @include('user.activity.order-details', ['order' => $order])
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

