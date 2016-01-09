@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Izdelki</h2>
        <hr>

        {!! Form::open() !!} {!! Form::close() !!}

        <div class="col col-lg-12 products">
            @foreach ($products as $product)

                <div class="col-sm-4 col-lg-4 col-md-4 products__item" data-id="{{ $product["id"] }}">
                    <div class="thumbnail">
                        <img src="{{ $product["image_path"] }}" alt="">
                        <div class="caption">
                            <h4 class="pull-right">24.99 Eur</h4>
                            <h4>{{ $product["name"] }}</h4>
                            <h4>{{ $product["manufacturer"] }}</h4>
                            <h5>Količina {{$product["stock"]}}</h5>
                        </div>
                        <div class="text-center">
                            {!! Form::open(['url' => 'cart', 'method' => 'PUT']) !!}
                                <button type="button" class="btn btn-primary">Dodaj v košarico</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>

@endsection