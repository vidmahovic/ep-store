@extends('app')

@section('content')
<section data-section="home">
        <div class="row">
            <h2>Izdelki</h2>
            <hr>
            @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="col col-lg-12 products">
                @if($products->isEmpty())
                    <h1>Ni izdelkov.</h1>
                @else
                    {!! Form::open(['url' => 'cart']) !!}
                    @foreach ($products as $product)

                        <div class="col-sm-4 col-lg-4 col-md-4 products__item" data-id="{{ $product->id }}">
                            <div class="thumbnail">
                                <img src="{{ $product->image_path }}" alt="product image">
                                <div class="caption">
                                    <h3 class="pull-right">{{ number_format($product->price, 2) }} €</h3>
                                    <h4>{{ $product->name }}</h4>
                                    <br>
                                    <h5>{{ $product->manufacturer }}</h5>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col col-xs-6 text-left">
                                        <a type="button" href="{{ url('products/'.$product->id) }}" class="btn btn-primary btn-sm">Podrobnosti</a>
                                    </div>
                                    <div class="col col-xs-6 text-right">
                                        @if(Auth::guest() || Auth::user()->hasRole('customer'))
                                            @if($product->stock > 0)
                                                <button id="addToCart" type="button" class="btn btn-success btn-sm">Dodaj v košarico</button>
                                            @else
                                                <button id="addToCart" type="button" class="btn btn-danger btn-sm disabled">Ni na zalogi</button>
                                            @endif
                                        @endif
                                        @if(Auth::check() && Auth::user()->hasRole('employee'))
                                            <a type="button" href="{{ url('user/products/'.$product->id) }}" class="btn btn-warning btn-sm">Uredi izdelek</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {!! Form::close() !!}
                    <div class="text-center">
                        {!! $products->render() !!}
                    </div>
                @endif
            </div>
        </div>
</section>
@endsection