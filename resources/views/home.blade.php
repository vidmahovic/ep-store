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
                                <div class="row text-center">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                            <a type="button" href="{{ url('products/'.$product->id) }}" class="btn btn-primary btn-xs">Podrobnosti</a>
                                        @if(Auth::guest() || Auth::user()->hasRole('customer'))
                                            @if($product->stock > 0)
                                                <button id="addToCart" type="button" class="btn btn-success btn-xs">Dodaj v košarico</button>
                                            @else
                                                <button type="button" class="btn btn-danger btn-xs disabled">Ni na zalogi</button>
                                            @endif
                                        @endif
                                        @if(Auth::check() && Auth::user()->hasRole('employee'))
                                            @if($product->trashed())
                                                <button id="activate" type="button" class="btn btn-info btn-xs">Aktiviraj</button>
                                            @else
                                                <a type="button" href="{{ url('user/products/'.$product->id.'/edit') }}" class="btn btn-warning btn-sm">Uredi izdelek</a>
                                                <button id="deactivate" type="button" class="btn btn-danger btn-xs">Deaktiviraj</button>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col col-lg-12">
                {!! Form::close() !!}
                <div class="text-center">
                    {!! $products->render() !!}
                </div>
            </div>
        </div>
</section>
@endsection