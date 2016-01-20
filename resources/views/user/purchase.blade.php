@extends('app')

@section('content')
    <section data-section="purchase">
        <div class="container">
            <div class="row">
                <div class="col col-lg-12">
                    <h2>Nakup</h2>
                    @if(! $products->isEmpty())
                        <div class="row">
                            <div class="col col-lg-12">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <hr>
                                <h3>Izdelki</h3>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Serijska številka</th>
                                        <th>Naziv</th>
                                        <th>Proizvajalec</th>
                                        <th>Količina</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr class="product" data-id="{{ $product->id }}">
                                            <td>{{  $product->serial_num }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->manufacturer }}</td>
                                            <td>{{ $quantities[$product->id] }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="col-lg-12 text-right">
                                    <br>
                                    <br>
                                    <p>
                                        <strong>Znesek: {{$total}} EUR</strong>
                                    </p>
                                    <br>
                                    <br>
                                </div>
                                {!! Form::open(['url' => 'customer/orders', 'method' => 'POST']) !!}
                                    <button type="submit" class="btn btn-success pull-right">Zaključi nakup</button>
                                {!! Form::close() !!}
                                {{--<a href="#" id="buy" class="btn btn-success pull-right">Zaključi nakup</a>--}}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection