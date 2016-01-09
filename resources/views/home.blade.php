@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Izdelki</h2>
        <hr>
        <div class="col col-lg-12 products">
            @if($products->isEmpty())
                <h1>Ni izdelkov.</h1>
            @else
                @foreach ($products as $product)

                    <div class="col-sm-4 col-lg-4 col-md-4 products__item" data-id="{{ $product->id }}">
                        <div class="thumbnail">
                            <img src="{{ $product->image_path }}" alt="">
                            <div class="caption">
                                <h4 class="pull-right">{{ $product->price }} EUR</h4>
                                <h4>{{ $product->name }}</h4>
                                <h4>{{ $product->manufacturer }}</h4>
                            </div>
                            <div class="text-left">
                                <button type="button" class="btn btn-primary">Podrobnosti</button>
                            </div>
                            <div class="text-right">
                                {!! Form::open(['url' => 'cart', 'method' => 'PUT']) !!}
                                    <button type="button" class="btn btn-success">Dodaj v košarico</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center">
                    {!! $products->render() !!}
                </div>
            @endif
        </div>
    </div>
</div>

@endsection