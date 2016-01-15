@extends('app')

@section('content')
<div class="row">
    <div class="col col-lg-12">
        <h2>Pretekli nakupi</h2>
        @if($orders->isEmpty())
            <h3>Zgodovina nakupov je prazna.</h3>
        @else
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Številka naročila</th>
                <th>Status</th>
                <th>Podrobnosti</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <th>{{ $order->id }}</th>
                    <th>
                        {{ $order->state()->first()->name }}
                    </th>
                    <th>
                        <a data-toggle="collapse" href="#order-'{{ $order->id }}'" aria-expanded="false" aria-controls="orderDetails">
                            Več
                        </a>
                    </th>
                </tr>
                @include('user.activity.order-details')
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection

