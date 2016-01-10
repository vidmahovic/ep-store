@extends('app')

@section('content')
<section data-section="home">
    <div class="container">
        <div class="row">
            <h2>Izdelki</h2>
            <hr>
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
                                    <h4 class="pull-right">{{ $product->price }} EUR</h4>
                                    <h4>{{ $product->name }}</h4>
                                    <h4>{{ $product->manufacturer }}</h4>
                                </div>
                                <div class="row">
                                    <div class="col col-xs-6 text-left">
                                        <button type="button" class="btn btn-primary btn-sm">Podrobnosti</button>
                                    </div>
                                    <div class="col col-xs-6 text-right">
                                        <button id="addToCart" type="button" class="btn btn-success btn-sm">Dodaj v košarico</button>
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
    </div>
</section>
@endsection