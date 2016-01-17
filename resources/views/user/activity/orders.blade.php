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
                                <th>Skupaj</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($orders as $order)
                                <tr data-toggle="collapse" data-target="#order{{$order->id}}" class="accordion-toggle">

                                        <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->state()->first()->name }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->shipping }}</td>
                                    <td>{{ number_format($order->shipping + $order->price, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="12" class="hiddenRow">
                                        <div class="accordian-body collapse" id="order{{$order->id}}">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><strong>Ime produkta</strong></th>
                                                        <th><strong>Cena kos</strong></th>
                                                        <th><strong>Količina</strong></th>
                                                        <th><strong>Cena</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order->products() as $product)
                                                        <tr>
                                                            <td>{{ $product->name }}</td>
                                                            <td>{{ $product->price }}€</td>
                                                            <td>{{ $product->quantity }}</td>
                                                            <td>{{ number_format($product->quantity * $product->price, 2) }}€</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

